<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Blazervel\Features\Action;

class Edit extends Action
{
    public function handle(Workspace $workspace, User $user): Response
    {
        return Inertia::render('@blazervel/workspaces/Pages/Users/Edit', [
            'workspace' => $workspace,
            'user' => $user
        ]);
    }
}
