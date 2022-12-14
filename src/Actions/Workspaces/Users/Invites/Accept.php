<?php

namespace Blazervel\Workspaces\Actions\Workspaces\Users\Invites;

use App\Models\Workspace;
use Blazervel\Workspaces\Models\WorkspaceUserInviteModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Blazervel\Blazervel\Action;

class Accept extends Action
{
    public function handle(Request $request, Workspace $workspace, WorkspaceUserInviteModel $workspaceUserInvite): RedirectResponse
    {
        if (!$request->user()) {
            Session::put('url.intended', $request->getUri());
            return redirect()->route('register');
        }
        
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
