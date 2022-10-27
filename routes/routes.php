<?php

use Blazervel\Workspaces\Actions\Workspaces;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {

    Route::middleware(['verified'])->group(function () {

        Route::get('home', Workspaces\Index::class)->name('home');

        Route::prefix('workspaces')->group(function () {
            Route::get( '/',           Workspaces\Index::class )->name('workspaces.index');
            Route::post('/',           Workspaces\Store::class )->name('workspaces.store');
            Route::get( 'create',      Workspaces\Create::class)->name('workspaces.create');
            Route::get( '{workspace}', Workspaces\Show::class  )->name('workspaces.show');

            Route::prefix('{workspace}/users')->group(function () {
                Route::get('{user}/edit', Workspaces\Users\Edit::class     )->name('workspaces.users.edit');
                Route::get('/',           Workspaces\Users\Index::class    )->name('workspaces.users.index');
                Route::put('{user}',      Workspaces\Users\Update::class   )->name('workspaces.users.update');
                
                Route::prefix('invites')->group(function () {
                    Route::get(   '/',                     Workspaces\Users\Invites\Index::class  )->name('workspaces.users.invites.index');
                    Route::post(  'send',                  Workspaces\Users\Invites\Send::class   )->name('workspaces.users.invites.send');
                    Route::delete('{workspaceUserInvite}', Workspaces\Users\Invites\Destroy::class)->name('workspaces.users.invites.destroy');
                });
            });
        });
    });

    Route::middleware('signed')->group(function () {
        Route::get('workspaces/{workspace}/users/invites/{workspaceUserInvite}/accept', Workspaces\Users\Invites\Accept::class)->name('workspaces.users.invites.accept');
    });
    
});