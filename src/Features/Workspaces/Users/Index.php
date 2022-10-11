<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use Blazervel\Feature\Action;
use Inertia\Inertia;
use Inertia\Response;

class Index extends Action
{
    public function handle(Workspace $workspace): Response
    {
        return Inertia::render('@blazervel/workspaces/Pages/Users/Index', [
            'workspace' => $workspace,
            'users' => $workspace->users()->get(),
        ]);
    }
}
