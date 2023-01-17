<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Throwable;

class PostController extends Controller {
    public function index() {
        //
    }

    public function create(Request $request) {
        if ($request->session()->get('email') != null) {
            $user = User::where(
                    "email",
                    $request->session()->get('email')
                )->first();
            $data = [
                'user' => $user->name,
            ];
        } else {
            $data = [
                'user' => null
            ];
        }
        return view("post.create.index", $data);
    }

    public function create_post(Request $request) {
        $user = User::where("email", $request->session()->get("email"))->first();
        $title = $request->input("title");
        $text = $request->input("text");
    
        try {
            Post::insert([
                "title" => $title,
                "body" => $text,
                "user_id" => $user->id,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            return redirect(route("index"));
        } catch (Throwable $e) {
            dd($e);
        }
    }

    public function edit(Request $request, $id) {
        if ($request->session()->get('email') != null) {
            $user = User::where(
                    "email",
                    $request->session()->get('email')
                )->first();
            $data = [
                'user' => $user->name,
            ];
        } else {
            $data = [
                'user' => null
            ];
        }
        $data['post'] = Post::find($id);
        return view("post.edit.index", $data);
    }

    public function edit_post(Request $request, $id) {
        $updated_at = date("Y-m-d H:i:s");
        $title = $request->input("title");
        $text = $request->input("text");

        $post = Post::find($id);

        try {
            $post->update([
                'title' => $title,
                'body' => $text,
                'updated_at' => now()
            ]);
            return redirect(route('index'));
        } catch (Throwable $ex) {
            print($ex);
        }
    }

    public function destroy($id) {
        $post = Post::find($id);

        if ($post != null) {
            $post->delete();
            return redirect(route('index'));
        }
    }
}
