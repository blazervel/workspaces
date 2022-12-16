import { LoadingIcon, IndexLayout } from '@blazervel-ui/components'

export default function ({ workspace, workspaces, navigation, alerts, users }) {

  return (
    <IndexLayout
      navigation={navigation}
      team={workspace}
      teams={workspaces}
      alerts={alerts}
      pageTitle={lang('blazervel_workspaces::users.users')}
      pageActions={[
        {route: route('workspaces.users.invites.index', {workspace: workspace.uuid}), text: lang('blazervel_workspaces::users.invites'), primary: false},
        {route: route('workspaces.users.invites.index', {workspace: workspace.uuid}), text: lang('blazervel_workspaces::users.invite_user'), primary: true}
      ]}
      items={users}
      itemsNoneFoundButtonText={lang('blazervel_workspaces::users.invite_user')}
      itemsNoneFoundButtonRoute={route('workspaces.users.invites.index', {workspace: workspace.uuid})}
      itemRoute={(item) => route('workspaces.users.edit', {workspace: workspace.uuid, user: item.uuid})}
    />
  )
}