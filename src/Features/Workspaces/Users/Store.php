<?php

namespace Blazervel\Workspaces\Features\Workspaces\Users;

use App\Models\User;
use App\Models\Workspace;
use Inertia\Response;
use Blazervel\Feature\Action;
use Illuminate\Http\Request;

class Store extends Action
{
  public function handle(Request $request, Workspace $workspace): Response
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email:dns,rfc,spoof,filter|max:255|unique:users',
      'role' => 'nullable',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
    ]);
    
    $workspace->users()->attach(
      $user->id,
      $request->only('role')
    );

    return redirect()->route('workspaces.users.index', $workspace);
  }
}