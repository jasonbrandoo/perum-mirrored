<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Setting;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use App\Model\Page;

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
        View::share([
            'setting_name' => $name,
        ]);
        
        $page = Page::all();
        foreach ($page as $key => $value) {
            config(['roles' => $value->getRoleNames()->implode('|')]);
        }
        // foreach ($pages as $value) {
        //     config(['roles' => $value->getRoleNames()]);
        // }
    }
}
