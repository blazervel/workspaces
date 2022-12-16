<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users;

use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Blazervel\Blazervel\Action;

class Edit extends Action
{
    public function handle(Workspace $workspace, User $user): Response|RedirectResponse
    {
        return Inertia::render('Pages/Workspaces/Users/Edit', [
            'workspace' => $workspace,
            'user' => $user
        ]);
    }
}
