<?php

use Illuminate\Support\Facades\Route;
use Blazervel\Workspaces\Features\Workspaces;

Route::middleware(['auth', 'verified'])->group(function(){

  Route::get('/', Workspaces\Index::class)->name('home');

  Route::prefix('workspaces')->group(function(){
    Route::get( '/',           Workspaces\Index::class )->name('workspaces.index');
    Route::post('/',           Workspaces\Store::class )->name('workspaces.store');
    Route::get( 'create',      Workspaces\Create::class)->name('workspaces.create');
    Route::get( '{workspace}', Workspaces\Show::class  )->name('workspaces.show');
    
    Route::prefix('{workspace}/users')->group(function(){
      Route::get( '/', Workspaces\Users\Index::class )->name('workspaces.users.index');
    });
  });

});