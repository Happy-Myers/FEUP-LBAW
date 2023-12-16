<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\AuthorizationException;

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

            return redirect(auth()->user()->hasRole('Admin') ? '/admin' : '/');
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

        return redirect('/');
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

        return redirect('/');
    }
    
    public function show(User $user) {
        $purchases = $user->purchases;

        return view('users.show', [
            'user'=>$user,
            'purchases'=>$purchases
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
            'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9']
        ]);

        if(request()->hasFile('image')){
            $formFields['image'] = request()->file('image')->store('users', 'public');
        }

        auth()->user()->update($formFields);

        return redirect("users/" . auth()->id());
    }

    public function destroy(){
        $user = auth()->user();

        $user->delete();

        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();


        return redirect('/');
    }

    public function index(){
        $users = User::where('banned', false)->where('permission', 'User')->filter(request(['searchActive']))->orderBy('name')->paginate(8);
        $banned = User::where('banned', true)->filter(request(['searchBanned']))->orderBy('name')->paginate(8);

        return view('users.index', [
            'users' => $users,
            'banned' => $banned
        ]);
    }

    public function toggle_ban(User $user){
        try{
            $this->authorize('isAdmin', User::class);
        } catch(AuthorizationException $e){
            return back()->with('message', 'You are not allowed to ban/unban users');
        }
        $change['banned'] = !$user->banned;
        $user->update($change);
        
        return back()->with('message', 'User successfully banned/unbanned');
    }
}
