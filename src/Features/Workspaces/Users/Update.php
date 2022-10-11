<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\Workspace;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Blazervel\Feature\Action;
use Illuminate\Support\Facades\Hash;

class Update extends Action
{
    public function rules()
    {
        return [
            'name' => 'string|required',
            'email' => 'required|string|email:dns,rfc,spoof,filter|max:255|unique:users',
            'password' => ['sometimes', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function handle(Request $request, Workspace $workspace, User $user): RedirectResponse
    {
        $this->validate();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', __('blazervel_workspaces::users.user_updated_successfully'));

        return redirect()->route('workspaces.users.edit', $workspace);
    }
}
