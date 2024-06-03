<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//all listings
Route::get('/', [ListingController::class, 'index']);

//show create form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

//store listing data - post
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//  update
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//  delete
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

//manage listing middlewae auth->guest cant visit
Route::get('/listings/manage',[ListingController::class, 'manage'])->middleware('auth');

  


//single listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);
    
// register user
Route::get('/register',[UserController::class, 'create'])->middleware('guest'); 

//create new user
Route::post('/users',[UserController::class, 'store']);

// user log out
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');;

// show login form
Route::get('/login',[UserController::class, 'login'])->name('login')
->middleware('guest');
// log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);





/*
Route::get('/posts/{id}', function($id){
    return response('Post ' . $id);
}) ->where('id', '[0-9]+');

Route::get('/search', function(Request $request){

}); */
//single listing

// Route::get('/listings/{id}', function($id){
// return view('listing', [
// 'listing' => Listing::find($id)

// ]);
// });

/*[
            
        [
            'id' => 1,
            'title' => 'listing one',
            'description' => '[Wed Aug 31 12:13:38 2022] 127.0.0.1:59950 [200]: /favicon.ico
            [Wed Aug 31 12:51:15 2022] 127.0.0.1:63280 [200]: /favicon.ico
            [Wed Aug 31 12:51:22 2022] 127.0.0.1:63300 [200]: /favicon.ico
            [Wed Aug 31 12:55:00 2022] 127.0.0.1:63592 [200]: /favicon.ico
            [Wed Aug 31 13:11:16 2022] 127.0.0.1:64837 [200]: /favicon.ico
            [Wed Aug 31 13:17:46 2022] 127.0.0.1:65273 [200]: /favicon.ico
            [Wed Aug 31 13:17:50 2022] 127.0.0.1:65286 [200]: /favicon.ico
            [Wed Aug 31 13:23:42 2022] 127.0.0.1:49340 [200]: /favicon.ico'
        ],
            [

                'id' => 1,
                'title' => 'listing one',
                'description' => '[Wed Aug 31 12:13:38 2022] 127.0.0.1:59950 [200]: /favicon.ico
                [Wed Aug 31 12:51:15 2022] 127.0.0.1:63280 [200]: /favicon.ico
                [Wed Aug 31 12:51:22 2022] 127.0.0.1:63300 [200]: /favicon.ico
                [Wed Aug 31 12:55:00 2022] 127.0.0.1:63592 [200]: /favicon.ico
                [Wed Aug 31 13:11:16 2022] 127.0.0.1:64837 [200]: /favicon.ico
                [Wed Aug 31 13:17:46 2022] 127.0.0.1:65273 [200]: /favicon.ico
                [Wed Aug 31 13:17:50 2022] 127.0.0.1:65286 [200]: /favicon.ico
                [Wed Aug 31 13:23:42 2022] 127.0.0.1:49340 [200]: /favicon.ico' 

            ] 
        ]*/