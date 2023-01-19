<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller {
    public function index($user) {
        $profile = User::where('name', $user)->first();
        dd($profile);
    }
}
