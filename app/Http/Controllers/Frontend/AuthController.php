<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(){
        Inertia::render('Login');
    }
        public function register(){
        Inertia::render('Register');
    }
}
