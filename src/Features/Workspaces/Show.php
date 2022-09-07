<?php

namespace Blazervel\Workspaces\Features\Workspaces;

use App\Models\Workspace;
use Blazervel\Feature\Action;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Show extends Action
{
    public function handle(Request $request, Workspace $workspace): RedirectResponse
    {
        $redirect = '/';

        $request->user()->setCurrentWorkspace(
            workspace: $workspace
        );

        if (class_exists($routeServiceProvider = 'App\Providers\RouteServiceProvider')) {
            $redirect = $routeServiceProvider::HOME;
        }

        return redirect()->to($redirect);
    }
}
