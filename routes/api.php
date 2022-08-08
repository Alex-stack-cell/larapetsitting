<?php

use App\Http\Controllers\AdvertismentsController;
use App\Http\Controllers\AuthControllerOwner;
use App\Http\Controllers\AuthControllerPetSitter;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetSitterController;
use App\Http\Controllers\PrestationController;
use App\Models\Petsitter;
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

//Public Routes
// Pet Owners
Route::post('/owners/register',[AuthControllerOwner::class,'register']);
Route::post('/owners/login',[AuthControllerOwner::class,'login']);
Route::get('/owners',[OwnerController::class,'index']);
Route::get('/owners/{id}',[OwnerController::class,'show']);
Route::get('/owners/search/{owner}',[OwnerController::class,'search']);

//Vue Owner Comment => for owner score
Route::get('/owners/info',[OwnerController::class,'info']);

//Pet Sitters
Route::post('/petsitter/register',[AuthControllerPetSitter::class,'register']);
Route::post('/petsitters/login',[AuthControllerPetSitter::class,'login']);
Route::get('/petsitters',[PetSitterController::class,'index']);
Route::get('/petsitters/{id}',[PetSitterController::class,'show']);
Route::get('/petsitters/search/{petsitter}',[PetSitterController::class,'search']);

//Prestations
Route::get('/prestations',[PrestationController::class,'index']);
Route::get('/prestations/{id}',[PrestationController::class,'show']);

//Advertisments
Route::get('/advertisments',[AdvertismentsController::class,'index']);
Route::get('/advertisments/{id}',[AdvertismentsController::class,'show']);

//Comments
Route::get('/comments',[CommentController::class,'index']);
Route::get('/comments/{id}',[CommentController::class,'show']);

//Protected
Route::group(['middleware'=>['auth:sanctum']], function () {
//Pet Owners
Route::delete('/owners/{id}',[OwnerController::class,'destroy']);
Route::put('/owners/{id}', [OwnerController::class, 'update']);
Route::post('/owners/logout', [AuthControllerOwner::class, 'logout']);

//Pet Sitters
Route::delete('/petsitters/{id}',[PetSitterController::class,'destroy']);
Route::put('/petsitters/{id}', [PetSitterController::class, 'update']);
Route::post('/petsitters/logout', [AuthControllerPetSitter::class, 'logout']);

//Prestations
Route::post('/prestations/{petsitter_id}',[PrestationController::class,'create']);
Route::delete('/prestations/{id}/{petsitter_id}',[PrestationController::class,'destroy']);
Route::put('/prestations/{id}/{petsitter_id}', [PrestationController::class, 'update']);

//Advertisments
Route::post('/advertisments/{owner_id}',[AdvertismentsController::class,'create']);
Route::delete('/advertisments/{id}/{owner_id}',[AdvertismentsController::class,'delete']);
Route::put('/advertisments/{id}',[AdvertismentsController::class,'update']);

//Comments
Route::post('/comments',[CommentController::class,'create']);
Route::delete('/comments/{id}',[CommentController::class,'delete']);
Route::put('/comments/{id}',[CommentController::class,'update']);
});