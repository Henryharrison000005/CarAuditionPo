<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\Carcontroller;
use App\Http\Controllers\challengeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CarControler;


//use App\Http\Controllers\FirsrRescController;

// Route::get('/', function () {
//     $person = ["name" =>"Henry","age" => 22];
//    // dd($person);
//     return view('welcome');
// });

// Route::get('/about' , function(){
//     $person = ["name" =>"Henry","age" => 22];
//    // dd($person);
//     return view('about');
// });

// Route::get('/product/{id?}', action: function( $id){
//     return "the product id is $id";
// }) 
// ->whereNumber("id");

// Route::get('/category/{number}/{name}' , function(string $number,string $name){
//     $namedroute = route("category", ['number' =>$number , 'name'=>$name]);
//     dump($namedroute);
//     return "your name is $name and numbers are $number ";
// }) ->where(["name" =>"[a-z]+","number"=>"[1-9]+"])->name("category");

// Route::get("/reference",function(){
//     return "hello world";
// })->name("referencing");

// // Route::get("/direction", function(){
// //     return redirect()->route("referencing");
// // });


// Route::get("/direction", function(){
//     return to_route("referencing");
// });



// Route::prefix('admin')->group(function(){
// Route::get("/user",function(){
//     return "hello this is user`s page";
// });
// });


// Route::prefix("admin")->name("admin")->group(function(){
// Route::get("/user",function(){
//     return "helllo there";
// })->name("users");
// });

//Route::fallback

//Route::get("/index", [Usercontroller::class, "index"]);

// Route::controller(Usercontroller::class)->group(function(){
//     Route::get("/index","index");
// });

// Route::get("/cars" , Carcontroller::class);


// Route::prefix("admin")->group(function (){
//     Route:get
// });

// Route::get("/cars",usercontroller::class);
// Route::get("/cars/index",[usercontroller::class,"index"]);

// Route::get("/resource",FirsrRescController::class)->except(["index"]);

// Route::apiResources([
//     "/students" => FirsrRescController::class,
// ]);

//Route::get("/index",);

Route::get("/indexing",[HelloController::class,"welcome"]);

Route::get("/",function(){
    return view('layouts.index');
})->name('home');

Route::get("/home",function(){
    return view('components.layout.app');
});

Route::get('/signup',[SignupController::class,'create'])->name('signup');

Route::get("/login" , function (){
    return view("login");
})->name('login');


Route::get('/car/search',[CarControler::class,'search'])->name('car.search');
Route::get('/car/watchlist',[CarControler::class,'watchlist'])->name('car.watchlist');
Route::get('/test',[CarControler::class,'test']);

Route::get('/hello',[HomeController::class,"index"]);

Route::get("/about",function (){
    return view("/about");
});

Route::get("/aboutnew",[HomeController::class,"indexing"]);
Route::get("/aboutnews",[HomeController::class,"index"]);
Route::resource('car',CarControler::class);