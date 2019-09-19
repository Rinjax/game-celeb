<?php

namespace Rinjax\GameCeleb\Providers;

use Illuminate\Support\ServiceProvider;


class GameCelebServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'celeb');

        $this->loadRoutesFrom(__DIR__.'/../Http/Routes/game.php');

        $this->publishes([
            __DIR__.'/../Public' => public_path('game-celeb'),
        ], 'game');
    }

    public function register()
    {

    }
}