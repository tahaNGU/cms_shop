<?php

namespace App\Providers;

use App\Models\menu;
use App\Models\setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('site.layout.header', function($view) {
            $menus = menu::where('state','1')->where('menu_type','1')->orderBy('order','desc')->get();

            $view->with([
                'menus' => $menus,
            ]);
        });

        if (Schema::hasTable('settings')) {
            foreach (Setting::all() as $setting) {
                Config::set('setting.'.$setting->key, $setting->value);
            }
        }
    }
}
