<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use Inertia\{
  Inertia,
  Response
};
use Blazervel\Feature\Action;

class Create extends Action
{
  public function handle(Workspace $workspace): Response
  {
    return Inertia::render('Workspaces/Users/Create', [
      'workspace' => $workspace,
      'users' => $workspace->users()->get()
    ]);
  }
}