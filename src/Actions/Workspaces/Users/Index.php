<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users;

use App\Models\Workspace;
use Blazervel\Blazervel\Action;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class Index extends Action
{
    public function handle(Request $request, Workspace $workspace): Response
    {
        $users = $workspace
                    ->users()
                    ->where('users.id', '!=', $request->user()->id);

        return Inertia::render('@blazervel-workspaces/Pages/Users/Index', [
            'workspace' => $workspace,
            'users' => $users->get(),
        ]);
    }
}
