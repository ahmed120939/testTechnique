<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeReclamationController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
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
// Protected route
Route::group(['middleware'=>['auth:sanctum']],function(){
    
    Route::post('/logout', [UserController::class, 'logout']);
    Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

    Route::post('/typeReclamation/store', [TypeReclamationController::class, 'store']);

    Route::post('/reclamation/store', [ReclamationController::class, 'store']);
    Route::delete('/reclamation/delete/{id}', [UserController::class, 'delete']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});


// Public Route

// ********** Crud User *********** /////////

 Route::post('/registre', [UserController::class, 'registre']);
 Route::post('/login', [UserController::class, 'login']);
 Route::get('/user/getAll', [UserController::class, 'showAll']);
Route::get('/user/get/{id}', [UserController::class, 'show']);




// ********** Crud typeReclamation *********** /////////

Route::get('/typeReclamation/getAll', [TypeReclamationController::class, 'showAll']);

// ********** Crud Reclamation *********** /////////

Route::get('/reclamation/get/{id}', [ReclamationController::class, 'show']);
Route::get('/reclamation/getAll', [ReclamationController::class, 'showAll']);
Route::get('/reclamation/getByUser/{user_id}', [ReclamationController::class, 'showByUser']);
