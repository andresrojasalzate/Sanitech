<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // return view('pages.home');

        // $userData = User::find($user);
        // dd($userData);

        // return view('pages.home',['user'=>$userData]);
    }
}
