<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users\Invites;

use App\Models\Workspace;
use Blazervel\Workspaces\Models\WorkspaceUserInviteModel;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Blazervel\Actions\Action;

class Accept extends Action
{
    public function handle(Request $request, Workspace $workspace, WorkspaceUserInviteModel $workspaceUserInvite): RedirectResponse
    {
        $userId = $request->user()->id;
        
        // User may have already been added during registration
        if ($workspace->users()->find($userId) === null) {
            $workspace->users()->attach(
                $userId
            );
        }

        $workspaceUserInvite->update([
            'accepted_at' => Carbon::now()
        ]);

        $request->session()->flash('success', __('blazervel_workspaces::invites.youve_been_added_to_workspace', ['workspace_name' => $workspace->name]));

        return redirect()->route('workspaces.show', $workspace);
    }
}
