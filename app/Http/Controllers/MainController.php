<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request) {
        $data = [
            'user' => $request->session()->get('email'),
        ];
        return view("main.index", $data);
    }
}
