import { IndexLayout } from '@blazervel/ui/components'
import { lang, route } from '@blazervel/actionsjs'

export default function ({ workspace, users }) {

  const createRoute = '' //route('workspaces.users.invite')

  return (
    <IndexLayout
      pageTitle={lang('blazervel_workspaces::users.users')}
      pageActions={[
        {route: route('workspaces.users.invites.index', {workspace: workspace.uuid}), text: lang('blazervel_workspaces::users.invites'), primary: false},
        {route: route('workspaces.users.invites.index', {workspace: workspace.uuid}), text: lang('blazervel_workspaces::users.invite_user'), primary: true}
      ]}
      items={users}
      itemsNoneFoundRoute={createRoute}
      itemRoute={(item) => route('workspaces.users.edit', {workspace: workspace.uuid, user: item.uuid})}
    />
  )
}