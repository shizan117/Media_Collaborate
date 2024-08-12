<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function landingPage(){
        $users= User::all();
        return view('front_end.home.home',compact('users'));
    }


    public function signIn(){
        return view('front_end.auth.signIn');
    }


    public function SignUP()
    {
        return view('front_end.auth.SignUP');
    }



}
