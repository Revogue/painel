<?php

namespace App\Modules\Admin\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::component('admin::components.form.input.text', 'input_text');
        Blade::component('admin::components.form.input.number', 'input_number');
        Blade::component('admin::components.form.input.date', 'input_date');
        Blade::component('admin::components.form.input.textarea', 'textarea');
        Blade::component('admin::components.form.input.checkbox', 'checkbox');
        Blade::component('admin::components.form.input.select', 'select');

        Blade::component('admin::components.panel', 'panel');

    }
}
