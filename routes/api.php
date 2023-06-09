<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\DiscussionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/approveDiscussion/{discusion}', [DiscussionController::class, 'approveDiscusion']);
        Route::post('/postDiscussion',[DiscussionController::class,'store']);
        Route::delete('/deleteDis/{discusion}',[DiscussionController::class, 'destroy']);
        Route::put('/editComment/{comment}',[CommentController::class, 'update']);
});


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::get('/listdis',[DiscussionController::class , 'index']);
Route::get('/listdis/{discusion}',[DiscussionController::class, 'show']);

//Everyone can see the comments
Route::get('/listComments', [CommentController::class , 'index']);
Route::get('/listComment/{comment}',[CommentController::class, 'show']);
Route::post('/addComment',[CommentController::class, 'store']);
Route::delete('/deleteComment/{comment}',[CommentController::class, 'destroy']);




