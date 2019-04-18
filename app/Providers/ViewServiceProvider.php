<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Setting;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use App\Model\Page;
use Illuminate\Support\Arr;

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
            $data[] = $value->getRoleNames();
            $flatten = Arr::flatten($data);
        }
        $collect = collect($flatten)->unique()->values()->all();
        $get_roles = collect($collect)->implode('|');
        config(['roles' => $get_roles]);
        // foreach ($pages as $value) {
        //     config(['roles' => $value->getRoleNames()]);
        // }
    }
}
