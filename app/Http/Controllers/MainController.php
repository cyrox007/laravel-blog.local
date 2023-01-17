<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class MainController extends Controller
{
    public function index(Request $request) {
        if ($request->session()->get('email') != null) {
            $user = User::where(
                    "email",
                    $request->session()->get('email')
                )->first();
            $data['user'] = $user->name;
        } else {
            $data['user'] = null;
        }
        
        $data['posts'] = Post::join('users', 'posts.user_id', '=', 'users.id')->get([
            "posts.id",
            "posts.title",
            "posts.body",
            "posts.created_at",
            "posts.updated_at",
            "users.name"
        ]);
        return view("main.index", $data);
    }
}
