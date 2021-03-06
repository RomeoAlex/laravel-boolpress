<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API PER I POST
// rotta per i post 
Route::get('/posts', 'Api\PostController@index');
// controllare successivamente le rotte su route:list
Route::get('/posts/{slug}', 'Api\PostController@show');

// API PER I TAGS
Route::get('/tags/{slug}', 'Api\TagController@show');