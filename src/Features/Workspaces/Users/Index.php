<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use Blazervel\Features\Action;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class Index extends Action
{
    public function handle(Request $request, Workspace $workspace): Response
    {
        return Inertia::render('@blazervel/workspaces/Pages/Users/Index', [
            'workspace' => $workspace,
            'users' => $workspace->users()->where('id', '!=', $request->user()->id)->get(),
        ]);
    }
}
