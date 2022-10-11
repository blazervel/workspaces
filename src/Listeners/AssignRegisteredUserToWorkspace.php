<?php

namespace Blazervel\Workspaces\Listeners;

use Blazervel\Workspaces\Features\Workspaces\Users\Invites\Accept;
use Blazervel\Workspaces\Models\WorkspaceModel;
use Blazervel\Workspaces\Models\WorkspaceUserInviteModel;
use Illuminate\Auth\Events\Registered;

class AssignRegisteredUserToWorkspace
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        if (WorkspaceUserInviteModel::intendedUrlIsWorkspaceInviteAccept()) {
            return;
        }
        
        $user = $event->user;
        $workspaceModelClass = $this->workspaceModelClass();
        
        $workspace = $workspaceModelClass::create([
            'name' => __('blazervel_workspaces::workspaces.users_workspace', [
                'name_possessive' => $workspaceModelClass::workspaceNameFromUserName($user)
            ]),
        ]);

        $workspace->users()->attach(
            $user->id,
            ['role' => 'owner']
        );
    }

    private function workspaceModelClass(): string
    {
        $themeWorkspaceModelClass = '\\App\\Models\\Workspace';

        if (
            class_exists($themeWorkspaceModelClass) &&
            is_subclass_of($themeWorkspaceModelClass, WorkspaceModel::class)
        ) {
            return $themeWorkspaceModelClass;
        }

        return WorkspaceModel::class;
    }
}
