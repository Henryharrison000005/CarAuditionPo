<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HelloController extends Controller
{
    public function welcome(){
        return View::make("hello.welcome",[
            "name" => "Henry",
            "surname" => "<small>Kileo</small>",
            "cars" =>["ferrari","range_rover","carry"],
            "country" => "Tz",
        ]);
    }
}
