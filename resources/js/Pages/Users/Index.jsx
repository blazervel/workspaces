import { IndexLayout } from '@blazervel/components'

export default function ({ workspace, users }) {

  const createRoute = '' //route('workspaces.users.invite')

  return (
    <IndexLayout
      pageTitle={lang('blazervelWorkspaces::users.users')}
      pageActions={[
        {route: route('workspaces.users.invites.index', {workspace: workspace.uuid}), text: lang('blazervelWorkspaces::users.invites'), primary: false},
        {route: route('workspaces.users.invites.index', {workspace: workspace.uuid}), text: lang('blazervelWorkspaces::users.invite_user'), primary: true}
      ]}
      items={users}
      itemsNoneFoundRoute={createRoute}
      itemRoute={(item) => route('workspaces.users.edit', {workspace: workspace.uuid, user: item})}
    />
  )
}