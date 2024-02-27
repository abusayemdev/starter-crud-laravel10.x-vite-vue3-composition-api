<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

//site controllers
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ExampleController;

//admin controllers
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\SettingController;

//user controllers
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\SocialMediaController;



//Site routes
Route::get('/', function () {
    $user = auth()->user();
    return view('welcome', compact('user'));
})->name('/');

Route::get('site-settings', [SiteController::class, 'site_settings'])->name('site-settings');
Route::get('locale/{lang}', [LocalizationController::class, 'changeLanguage'])->name('locale');
Route::get('translation/{text}', [LocalizationController::class, 'translation'])->name('translation');
Route::get('example', [ExampleController::class, 'index'])->name('example');


//user profile
Route::middleware('user')->group(function(){

    //frontend dashboard routes
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    //user profile route
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile-update', [UserController::class, 'profile_update'])->name('profile-update');

    //social media 
    Route::resource('social-media', SocialMediaController::class);

});


//admin routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    
    Route::namespace('Auth')->middleware('guest:web')->group(function(){

        //admin login route
        Route::get('/admin-login', [AdminAuthenticatedSessionController::class, 'create'])->name('admin-login');
        Route::post('/admin-login', [AdminAuthenticatedSessionController::class, 'store'])->name('admin-login');

    });

    Route::middleware('admin')->group(function(){

        //admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->defaults('_config', [
            'view' => 'admin.home'])
            ->name('dashboard');

        //super admin routes
        Route::get('super-admin', [SuperAdminController::class, 'index'])->defaults('_config', [
            'view' => 'admin.super_admin.index'])
            ->name('super-admin.index');

        Route::get('super-admin/create', [SuperAdminController::class, 'create'])->defaults('_config', [
            'view' => 'admin.super_admin.create'])
            ->name('super-admin.create');

        Route::post('super-admin/{id}', [SuperAdminController::class, 'store'])->defaults('_config', [
            'redirect' => 'admin.super-admin.index'])
            ->name('super-admin.store');

        Route::get('super-admin/{id}', [SuperAdminController::class, 'show'])->defaults('_config', [
            'view' => 'admin.super_admin.view'])
            ->name('super-admin.show');

        Route::get('super-admin/{id}/edit', [SuperAdminController::class, 'edit'])->defaults('_config', [
            'view' => 'admin.super_admin.edit'])
            ->name('super-admin.edit');

        Route::put('super-admin/{id}', [SuperAdminController::class, 'update'])->defaults('_config', [
            'redirect' => 'admin.super-admin.index'])
            ->name('super-admin.update');

        Route::delete('super-admin/{id}', [SuperAdminController::class, 'destroy'])->defaults('_config', [
            'redirect' => 'admin.super-admin.index'])
            ->name('super-admin.destroy');

        Route::get('make-super-admin/{id}', [SuperAdminController::class,'make_super_admin'])->defaults('_config', [
            'redirect' => 'admin.super-admin.index'])
            ->name('make-super-admin');

        Route::get('make-admin/{id}', [SuperAdminController::class,'make_admin'])->defaults('_config', [
            'redirect' => 'admin.super-admin.index'])
            ->name('make-admin');

        //settings routes
        Route::get('setting', [SettingController::class, 'index'])->defaults('_config', [
            'view' => 'admin.setting.settings'])
            ->name('setting.index');

        Route::get('setting/create', [SettingController::class, 'create'])->defaults('_config', [
            'view' => 'admin.setting.create'])
            ->name('setting.create');

        Route::get('setting/{id}/edit', [SettingController::class, 'edit'])->defaults('_config', [
            'view' => 'admin.setting.edit'])
            ->name('setting.edit');

        Route::get('setting/{id}', [SettingController::class, 'show'])->defaults('_config', [
            'view' => 'admin.setting.view'])
            ->name('setting.show');

        //translation
        Route::get('translation', [TranslationController::class, 'index'])->defaults('_config', [
            'view' => 'admin.translation.translations'])
            ->name('translation.index');

        Route::get('translation/create', [TranslationController::class, 'create'])->defaults('_config', [
            'view' => 'admin.translation.create'])
            ->name('translation.create');

        Route::get('translation/{id}/edit', [TranslationController::class, 'edit'])->defaults('_config', [
            'view' => 'admin.translation.edit'])
            ->name('translation.edit');

        //language
        Route::get('language', [LanguageController::class, 'index'])->defaults('_config', [
            'view' => 'admin.language.languages'])
            ->name('language.index');

        Route::get('language/create', [LanguageController::class, 'create'])->defaults('_config', [
            'view' => 'admin.language.create'])
            ->name('language.create');

        Route::get('language/{id}/edit', [LanguageController::class, 'edit'])->defaults('_config', [
            'view' => 'admin.language.edit'])
            ->name('language.edit');
    });

    //admin logout route
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});