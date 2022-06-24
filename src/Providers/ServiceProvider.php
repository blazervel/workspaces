<?php

namespace Blazervel\PackageClassName\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider 
{
  private string $pathTo = __DIR__ . '/../..';
  
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
      "{$this->pathTo}/resources/views", 'blazervel'
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
      'blazervel'
    );
  }

  private function loadConfig()
  {
    $this->publishes([
      "{$this->pathTo}/config/package-slug.php" => config_path('package-slug.php'),
    ]);
  }

  private function loadMigrations()
  {
    $this->loadMigrationsFrom(
      "{$this->pathTo}/database/migrations"
    );
  }

}