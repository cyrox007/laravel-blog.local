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
        $password = md5($request->input("password"));
        
        $user = User::where('email', $email)
                ->first();
        
        if ($user->password === $password) {
            $request->session()->put("email", $email);
            return redirect(route("index"));
        }

        return view("auth.login.index");
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect(route("index"));
    }
}
