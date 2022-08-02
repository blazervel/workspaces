<?php

namespace Blazervel\Workspaces\Features\Workspaces;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Blazervel\Feature\Action;

class Show extends Action
{

  public function handle(Request $request, Workspace $workspace): RedirectResponse
  {
    $request->user()->setCurrentWorkspace(
      workspace: $workspace
    );

    return redirect()->route('scorecards.index');
  }

}