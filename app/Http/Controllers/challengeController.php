<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class challengeController extends Controller
{
    public function sum(float $a=3, float $b=1){
return $a + $b ;
    }

    public function subtract(float $a=3, float $b=1){
return $a - $b ;
    }
}
