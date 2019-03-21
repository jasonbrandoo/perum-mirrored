<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Setting;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $setting = Setting::orderBy('created_at', 'desc')->first();
        $name = $setting->pt_name;
        View::share('setting_name', $name);
    }
}
