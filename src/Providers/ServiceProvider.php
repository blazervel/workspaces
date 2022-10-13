<?php

namespace Blazervel\Workspaces\Providers;

use Blazervel\Workspaces\Listeners\AssignRegisteredUserToWorkspace;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    private string $path = __DIR__ . '/../..';

    public function register()
    {
        //
    }

    public function boot()
    {
        Event::listen(
            Registered::class,
            AssignRegisteredUserToWorkspace::class
        );

        //Fortify::createUsersUsing(CreateNewUser::class);

        $this->loadViews();
        $this->loadRoutes();
        $this->loadTranslations();
        $this->loadMigrations();
    }

    private function loadViews()
    {
        $this->loadViewsFrom(
            "{$this->path}/resources/views",
            'blazervel_workspaces'
        );
    }

    private function loadRoutes()
    {
        $this->loadRoutesFrom(
            "{$this->path}/routes/routes.php"
        );
    }

    private function loadTranslations()
    {
        $this->loadTranslationsFrom(
            "{$this->path}/lang",
            'blazervel_workspaces'
        );
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom(
            "{$this->path}/database/migrations"
        );
    }
}
