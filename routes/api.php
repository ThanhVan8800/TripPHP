<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
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

Route::post('/auth/register',[AuthController::class,'register']);
Route::post('/auth/login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    //User
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/user',[AuthController::class,'user']);
    Route::post('/user',[AuthController::class,'update']);
    //Post
    Route::get('/posts',[PostController::class,'index']);// all posts
    Route::post('/posts',[PostController::class,'store']); // create post
    Route::get('/posts/{id}',[PostController::class,'show']); //xem posts
    Route::put('/posts/{id}',[PostController::class,'update']); // update post
    Route::delete('/posts/{id}',[PostController::class,'destroy']); //delete post
    //Comment
    Route::get('/posts/{id}/comments',[CommentController::class,'index']);// all comments of post
    Route::post('/posts/{id}/comments',[CommentController::class,'store']);// create cmt on a post
    Route::put('/comments/{id}',[CommentController::class,'update']);//update a cmt
    Route::delete('/comments/{id}', [CommentController::class,'destroy']);//delete cmt
    //Like
    Route::post('/posts/{id}/likes',[LikeController::class,'likeOrUnlike']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
