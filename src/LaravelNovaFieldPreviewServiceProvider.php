<?php

namespace Novius\LaravelNovaFieldPreview;

use Illuminate\Support\ServiceProvider;

class LaravelNovaFieldPreviewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laravel-nova-field-preview');

        $this->publishes([
            __DIR__.'/../lang' => lang_path('vendor/laravel-nova-field-preview'),
        ], 'lang');
    }
}
