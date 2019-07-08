<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/user/{username}/{password}', function ($username,$password) {
//    $user=\Illuminate\Support\Facades\Auth::attempt([
//        'name'=>$username,
//        'password'=>$password
//    ]);
////    $user=\App\User::where(['name'=>'hasan','password'=>'123456'])->first();
//    dd($username,$password,$user);
//
//});
