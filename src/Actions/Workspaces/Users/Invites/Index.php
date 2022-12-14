<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users\Invites;

use App\Models\Workspace;
use Blazervel\Blazervel\Action;
use Inertia\Inertia;
use Inertia\Response;

class Index extends Action
{
    public function handle(Workspace $workspace): Response
    {
        return Inertia::render('Pages/Workspaces/Users/Invites/Index', [
            'workspace' => $workspace,
            'invites' => $workspace->invites()->get(),
        ]);
    }
}
