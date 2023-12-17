<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
    public function login(){
        return view('users.login');
    }

    public function authenticate(){
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $rememberMe = request()->has('remember');

        if(auth()->attempt($formFields, $rememberMe)){

            request()->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput(['email', 'remember']);
    }

    public function logout(){
        $user = auth()->user();

        $user->setRememberToken(null);
        $user->save();

        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }

    public function forgot_password(){
        return view('users.forgot_password');
    }

    public function send_recovery_email(){
        $formFields = request()->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);
        $status = Password::sendResetLink(
            request()->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => ($status)])
                    : back()->withErrors(['email' => ($status)]);
    }

    public function reset_password(string $token){
        return view('users.reset_password', ['token'=>$token]);
    }

    public function change_password(){
        request()->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
        $status = Password::reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
                    ? redirect('/login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function create(){
        return view('users.register');
    }

    public function store(){
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', Rule::unique('users', 'phone_number')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'Registration successful! Welcome.');
    }
    
    public function show(User $user) {
        $purchases = $user->purchases;
        $reviews = $user->reviews;

        return view('users.show', [
            'user'=>$user,
            'purchases'=>$purchases,
            'reviews'=>$reviews
        ]);
    }

    public function edit(){
        return view('users.edit',[
            'user' => auth()->user()
        ]);
    }

    public function update(){
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg']
        ]);

        if(request()->hasFile('image')){
            $formFields['image'] = request()->file('image')->store('users', 'public');
        }

        auth()->user()->update($formFields);

        return redirect("users/" . auth()->id())->with('message', 'Profile updated!');
    }

    public function destroy(){
        $user = auth()->user();

        $user->delete();

        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();


        return redirect('/')->with('message', 'Your account has been deleted!');
    }
}
