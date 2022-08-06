<?php

namespace Blazervel\Workspaces\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider 
{
  private string $pathTo = __DIR__ . '/../..';

  public function register()
  {
    //
  }
  
  public function boot()
  {
    $this->loadViews();
    $this->loadRoutes();
    $this->loadTranslations();
    $this->loadConfig();
    $this->loadMigrations();
  }

  private function loadViews()
  {
    $this->loadViewsFrom(
      "{$this->pathTo}/resources/views", 'blazervel-workspaces'
    );
  }
  
  private function loadRoutes() 
  {
    $this->loadRoutesFrom(
      "{$this->pathTo}/routes/routes.php"
    );
  }

  private function loadTranslations() 
  {
    $this->loadTranslationsFrom(
      "{$this->pathTo}/lang", 
      'blazervel-workspaces'
    );
  }

  private function loadConfig()
  {
    $this->publishes([
      "{$this->pathTo}/config/blazervel_workspaces.php" => config_path('blazervel_workspaces.php'),
    ]);
  }

  private function loadMigrations()
  {
    $this->loadMigrationsFrom(
      "{$this->pathTo}/database/migrations"
    );
  }

}