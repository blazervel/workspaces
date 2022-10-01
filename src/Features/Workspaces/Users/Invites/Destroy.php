<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users\Invites;

use App\Models\Workspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Blazervel\Feature\Action;
use Blazervel\Workspaces\Models\WorkspaceUserInviteModel;

class Destroy extends Action
{
    public function handle(Request $request, Workspace $workspace, WorkspaceUserInviteModel $workspaceUserInvite): RedirectResponse
    {
        $workspaceUserInvite->delete();

        $request->session()->flash('success', __('blazervelWorkspaces::invites.invite_canceled_successfully'));

        return redirect()->route('workspaces.users.invites.index', $workspace);
    }
}
