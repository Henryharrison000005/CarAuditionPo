<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function create(){
        return (View::make('signUpPage'));
    }
}
