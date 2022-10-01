<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use App\Models\User;
use Blazervel\Feature\Action;
use Inertia\Inertia;
use Inertia\Response;

class Edit extends Action
{
    public function handle(Workspace $workspace, User $user): Response
    {
        return Inertia::render('@blazervelWorkspaces/Pages/Users/Edit', [
            'workspace' => $workspace,
            'user' => $user
        ]);
    }
}
