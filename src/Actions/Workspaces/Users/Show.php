<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users;

use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Blazervel\Blazervel\Action;

class Show extends Action
{
    public function handle(Request $request, Workspace $workspace, User $user): Response
    {
        return Inertia::render('@blazervel-ui/workspaces/Pages/Users/Show', [
            'workspace' => $workspace,
            'user' => $user
        ]);
    }
}
