<?php

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




//admin api routes

Route::namespace('Api\Admin')->prefix('admin')->name('api.admin.')->group(function(){
        
    //setting
    Route::apiResource('setting', SettingController::class);
    Route::get('toggle-status-setting/{id}', [App\Http\Controllers\Api\Admin\SettingController::class,'toggle_status_setting'])->name('toggle-stutus-setting');
    
    //language
    Route::apiResource('language', LanguageController::class);

    //translation
    Route::apiResource('translation', TranslationController::class);


});



