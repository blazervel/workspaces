<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use Inertia\{
  Inertia,
  Response
};
use Blazervel\Feature\Action;

class Index extends Action
{
  public function handle(Workspace $workspace): Response
  {
    return Inertia::render('@blazervelWorkspaces/Pages/Users/List', [
      'workspace' => $workspace,
      'users' => $workspace->users()->get()
    ]);
  }
}