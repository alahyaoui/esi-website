<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\ProgrammeController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/programme/{matricule}', [ProgrammeController::class, 'getStudentBulletin']);

// TODO: plus tard appel une methode differente
Route::get('/pae/{maticule}', [ProgrammeController::class, 'getStudentBulletin']);
