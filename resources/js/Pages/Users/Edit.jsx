import { EditLayout } from '@blazervel-ui/components'

export default function ({ workspace, workspaces, navigation, alerts, user, auth }) {
  
  const fields = [
    {name: 'name',  value: user.name,  label: lang('blazervel_workspaces::users.name'),  type: 'text',  disabled: auth.user.uuid !== user.uuid, required: true},
    {name: 'email', value: user.email, label: lang('blazervel_workspaces::users.email'), type: 'email', disabled: auth.user.uuid !== user.uuid, required: true},
  ]

  return (
    <EditLayout
      navigation={navigation}
      team={workspace}
      teams={workspaces}
      alerts={alerts}
      pageBreadcrumbs={[
        {name: lang('blazervel_workspaces::users.users'),     href: route('workspaces.users.index', {workspace: workspace.uuid})},
        {name: lang('blazervel_workspaces::users.edit_user'), href: null},
      ]}
      pageSuperHeading={lang('blazervel_workspaces::users.edit_user')}
      pageHeading={user.name}
      formRoute={route('workspaces.users.update', {workspace: workspace.uuid, user: user.uuid})}
      formSubmitButtonText={lang('blazervel_workspaces::users.update')}
      formShowBackButton
      formMethod="PUT"
      formFields={fields}/>
  )
}