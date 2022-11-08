<?php

namespace Blazervel\Workspaces\Actions\Workspaces;

use Blazervel\Blazervel\Action;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Store extends Action
{
    public function rules()
    {
        return [
            'name' => 'string|required',
        ];
    }

    public function handle(Request $request): RedirectResponse
    {
        $this->validate();

        $workspace = $request->user()->workspaces()->create(
            $request->all()
        );

        return redirect()->route('workspaces.show', $workspace);
    }
}
