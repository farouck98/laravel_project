<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EmojioneAreaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            base_path('vendor/mervick/emojionearea/dist') => public_path('vendor/emojionearea'),
        ], 'emojionearea');

    }
}
