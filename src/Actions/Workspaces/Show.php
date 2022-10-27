<?php

namespace Blazervel\Workspaces\Actions\Workspaces;

use App\Models\Workspace;
use Blazervel\Actions\Action;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Show extends Action
{
    public function handle(Request $request, Workspace $workspace): RedirectResponse
    {
        $workspace->setCurrent();

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
