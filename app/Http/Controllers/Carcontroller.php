<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Carcontroller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return "hello world this is my first singlle action controller" ;
    }
}
