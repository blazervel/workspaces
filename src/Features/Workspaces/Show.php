<?php

namespace Blazervel\Workspaces\Features\Workspaces;

use App\Models\Workspace;
use Illuminate\Http\{ Request, RedirectResponse };
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Blazervel\Feature\Action;

class Show extends Action
{

  public function handle(Request $request, Workspace $workspace): RedirectResponse
  {
    $redirect = RouteServiceProvider::HOME;
    $request->user()->setCurrentWorkspace(
      workspace: $workspace
    );

    if (class_exists($routeServiceProvider = 'App\Providers\RouteServiceProvider')) :
      $redirect = $routeServiceProvider::HOME;
    endif;

    return redirect()->to($redirect);
  }

}