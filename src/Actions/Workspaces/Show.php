<?php

namespace Blazervel\Workspaces\Actions\Workspaces;

use App\Models\Workspace;
use Blazervel\Blazervel\Action;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Show extends Action
{
    public function handle(Request $request, Workspace $workspace): RedirectResponse
    {
        $workspace->setCurrent();

        $request->session()->flash(
            'success',
            __('workspaces.switched_to_workspace', ['workspace_name' => $workspace->name])
        );

        return redirect()->route('workspaces.users.index', $workspace);
    }
}
