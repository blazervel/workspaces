<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users;

use App\Models\Workspace;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Blazervel\Actions\Action;

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
