<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use Blazervel\Feature\Action;
use Inertia\Inertia;
use Inertia\Response;

class Create extends Action
{
    public function handle(Workspace $workspace): Response
    {
        return Inertia::render('@blazervelWorkspaces/Pages/Users/Create', [
            'workspace' => $workspace,
            'users' => $workspace->users()->get(),
        ]);
    }
}
