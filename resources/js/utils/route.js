export default (name, params) => {

    let url = workspacesRoutes[name] || null

    if (!url) {
      return name
    }

    for (var k in params) {
      url = url.replace(`{${k}}`, typeof replace[k] === 'string' ? replace[k] : (replace[k].uuid || null))
    }

    return url
}

const workspacesRoutes = {
    'workspaces.index':                 '/workspaces',
    'workspaces.store':                 '/workspaces',
    'workspaces.create':                '/workspaces/create',
    'workspaces.show':                  '/workspaces/{workspace}',
    'workspaces.users.index':           '/workspaces/{workspace}/users',
    'workspaces.users.invites.index':   '/workspaces/{workspace}/users/invites',
    'workspaces.users.invites.send':    '/workspaces/{workspace}/users/invites/send',
    'workspaces.users.invites.destroy': '/workspaces/{workspace}/users/invites/{workspaceUserInvite}',
    'workspaces.users.invites.accept':  '/workspaces/{workspace}/users/invites/{workspaceUserInvite}/accept',
    'workspaces.users.update':          '/workspaces/{workspace}/users/{user}',
    'workspaces.users.edit':            '/workspaces/{workspace}/users/{user}/edit',
}