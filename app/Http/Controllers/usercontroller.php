<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
   public function index(){
        return "hello , this is user index from usercontroller" ;
    }

    public function __invoke(){
        return "this is just another invokable function in a normal controller" ;
    
    }
};