<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Translation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        require_once app_path('Helpers/helper.php');

        // Set the variables for all views
        View::composer('*', function ($view) {
            $view->with('lang_ar_text', app()->getLocale() == 'ar' ? 'lang-ar-text' : '');
            $view->with('lang_ar_text_position', app()->getLocale() == 'ar' ? 'lang-ar-text-position' : '');
            $view->with('lang_ar_text_right', app()->getLocale() == 'ar' ? 'text-right' : 'text-left');
            $view->with('lang_ar_float_right', app()->getLocale() == 'ar' ? 'float-right' : 'float-left');
        });


        
    }
}
