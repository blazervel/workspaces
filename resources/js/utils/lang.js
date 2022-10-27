// Temporary local-to-package lang() support for workspaces

export default (key, replace) => {

    key = key.split('.')[1] // blazervel_workspaces::workspaces.switched_to_workspace -> switched_to_workspace
    
    let translation = workspacesTranslations[key] || null

    if (!translation) {
      return key
    }

    for (var k in replace) {
       translation = translation.replace(':' + key, replace[k])
    }

    return translation
}

const workspacesTranslations = {
    invite: 'Invite',
    invites: 'Invites',
    email: 'Email',
    send_new_invite: 'Send new invite',
    send: 'Send',
    accept_invite: 'Accept Invite',
    invite_canceled_successfully: 'Invite canceled successfully',
    user_invited_you_to_app: ':user_name invited you to :app_name',
    user_invited_you_to_app_workspace: ':user_name has invited you to join :workspace_name on :app_name.',
    hey_there: 'Hey there!',
    if_this_was_sent_by_mistake: '(If this email was sent to you by mistake, feel free to delete it)',
    youve_been_added_to_workspace: "You've been added to :workspace_name",
    workspace: 'Workspace',
    workspaces: 'Workspaces',
    add_new: 'Add New',
    save: 'Save',
    name: 'Name',
    create_workspace: 'Create Workspace',
    add_workspace: 'Add Workspace',
    create: 'Create',
    users_workspace: ':name_possessive Workspace',
    switched_to_workspace: 'Switched to :workspace_name Workspace',
    users: 'Team Members',
    user_updated_successfully: 'Team member updated successfully',
    edit_user: 'Edit Team Member',
    name: 'Name',
    email: 'Email',
    password: 'Password',
    confirm_password: 'Confirm Password',
    invite_user: 'Invite Team Member',
    update: 'Update',
    my_profile: 'My Profile',
}