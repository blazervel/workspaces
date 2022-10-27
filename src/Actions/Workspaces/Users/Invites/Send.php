<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users\Invites;

use App\Models\Workspace;
use Illuminate\Support\Facades\Notification;
use Blazervel\Workspaces\Notifications\WorkspaceUserInvited;
use Blazervel\Actions\Action;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Send extends Action
{
    public function handle(Request $request, Workspace $workspace): RedirectResponse
    {
        $request->validate([
            'email' => 'required|string|email:dns,rfc,spoof,filter|max:255|unique:workspace_user_invites',
        ]);

        $invite = $workspace->invites()->create([
            'email' => $request->email,
            'invited_by' => $request->user()->id,
        ]);

        $invites = [$invite];

        Notification::send($invites, new WorkspaceUserInvited);

        return redirect()->route('workspaces.users.invites.index', $workspace);
    }
}
