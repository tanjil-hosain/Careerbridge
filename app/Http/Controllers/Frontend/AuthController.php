<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(){
        return Inertia::render('Login');
    }
        public function register(){
       return Inertia::render('Register');
    }
}
