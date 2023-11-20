<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfileController extends Controller
{
    public function show(string $id): View
    {
        return view('profile', [
            'user'=>User::find($id)
        ]);
    }
}
