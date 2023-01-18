<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Throwable;
use App\Jobs\ProcessUserVerified;

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

    public function register() {
        return view("auth.register.index");
    }

    public function register_user(Request $request) {
        $email = $request->input("email");
        $name = $request->input("name");
        $password = $request->input("password");
        $token = Str::random(10);
        
        
        try {
            User::insert([
                "email" => $email,
                "name" => $name,
                "password" => md5($password),
                "remember_token" => $token
            ]);
            ProcessUserVerified::dispatch($email);
            return redirect(route("index"));
        } catch (Throwable $ex) {
            dd($ex);
            /* return redirect(route("register")); */
        }
    }

    public function email_verified() {
        # code...
    }
}
