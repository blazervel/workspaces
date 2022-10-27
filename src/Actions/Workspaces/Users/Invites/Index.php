<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users\Invites;

use App\Models\Workspace;
use Blazervel\Actions\Action;
use Inertia\Inertia;
use Inertia\Response;

class Index extends Action
{
    public function handle(Workspace $workspace): Response
    {
        return Inertia::render('@blazervel/workspaces/Pages/Users/Invites/Index', [
            'workspace' => $workspace,
            'invites' => $workspace->invites()->get(),
        ]);
    }
}
