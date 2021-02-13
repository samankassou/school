<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CycleController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\AcademicYearController;

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
//academic_years routes
Route::apiResource('academic_years', AcademicYearController::class);
//posts routes
Route::apiResource('posts', PostController::class);
//cycles routes
Route::apiResource('cycles', CycleController::class);
//levels routes
Route::apiResource('levels', LevelController::class);
//students routes
Route::apiResource('students', StudentController::class);