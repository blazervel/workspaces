import { ShowLayout } from '@blazervel-ui/components'

export default function ({ workspace, workspaces, navigation, alerts, user, auth }) {

  const fields = [
    {name: 'name',  value: user.name,  label: lang('blazervel_workspaces::users.name'),  type: 'text',  disabled: auth.user.uuid !== user.uuid, required: true},
    {name: 'email', value: user.email, label: lang('blazervel_workspaces::users.email'), type: 'email', disabled: auth.user.uuid !== user.uuid, required: true},
  ]

  return (
    <ShowLayout
      navigation={navigation}
      team={workspace}
      teams={workspaces}
      alerts={alerts}
      pageBreadcrumbs={[
        {name: lang('blazervel_workspaces::users.users'),   href: route('workspaces.users.index', {workspace: workspace.uuid})},
        {name: lang('blazervel_workspaces::users.profile'), href: null},
      ]}
      item={user}
      itemFields={fields}
      pageSuperHeading={lang('blazervel_workspaces::users.user')}
      pageHeading={user.name} />
  )
}