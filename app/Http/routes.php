<?php

Route::get('/', [
    'uses' => '\Modu\Http\Controllers\HomeController@index',
    'as' => 'home',
]);

Route::get('/alert', function(){
   return redirect()->route('home')->with('info', 'You have signed up!'); 
});


Route::get('/signup',[
   'uses' => '\Modu\Http\Controllers\AuthController@getSignup',
   'as' => 'auth.signup',
]);

Route::post('/signup',[
   'uses' => '\Modu\Http\Controllers\AuthController@postSignup',
]);

Route::get('/signin',[
   'uses' => '\Modu\Http\Controllers\AuthController@getSignin',
   'as' => 'auth.signin',
]);

Route::post('/signin',[
   'uses' => '\Modu\Http\Controllers\AuthController@postSignin',
]);

Route::get('/signout',[
   'uses' => '\Modu\Http\Controllers\AuthController@getSignout',
   'as' => 'auth.signout',
]);