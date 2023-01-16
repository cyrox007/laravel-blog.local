<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view("auth.login.index");
    }

    public function login(Request $request) {
        $email = $request->input("email");
        $password = $request->input("password");
        $test = User::where('email', $email)
                ->first();
        echo($test->name);
    }
}
