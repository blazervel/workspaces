<?php

namespace Blazervel\Workspaces\Features\Workspaces;

use App\Models\User;
use Blazervel\Feature\Action;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class Index extends Action
{
    public function handle(Request $request): Response
    {
        $workspaces = $request->user()->workspaces()->get();
        $workspaceUsers = User::join('workspace_users', 'users.id', 'workspace_users.user_id')
                              ->whereIn('workspace_id', $workspaces->pluck('id')->all())
                              // ->select('workspace_users.workspace_id', 'users.name', 'users.profile_image_url')
                              ->get();

        return Inertia::render('@blazervelWorkspaces/Pages/Index', [
            'workspaces' => $workspaces,
            'users' => $workspaceUsers,
        ]);
    }
}
