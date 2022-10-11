<?php

namespace Blazervel\Workspaces\Features\Workspaces;

use App\Models\Workspace;
use Blazervel\Feature\Action;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Show extends Action
{
    public function handle(Request $request, Workspace $workspace): RedirectResponse
    {
        Workspace::setCurrent(
            workspace: $workspace
        );

        $request->session()->flash(
            'success',
            __('blazervel_workspaces::workspaces.switched_to_workspace', ['workspace_name' => $workspace->name])
        );

        if ($redirectTo = $request->redirect_url) {
            return redirect()->to($redirectTo);
        }

        return redirect()->back();
    }
}
