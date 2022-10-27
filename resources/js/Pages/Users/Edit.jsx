import { EditLayout } from '@blazervel/ui/components'
import { lang, route } from '../../utils'

export default function ({ workspace, user, auth }) {
  
  const fields = [
    {name: 'name',  value: user.name,  label: lang('blazervel_workspaces::users.name'),  type: 'text',     required: true},
    {name: 'email', value: user.email, label: lang('blazervel_workspaces::users.email'), type: 'email',    required: true},
  ]

  return (
    <EditLayout
      pageSuperHeading={lang('blazervel_workspaces::users.edit_user')}
      pageHeading={user.name}
      formRoute={route('workspaces.users.update', {workspace: workspace.uuid, user: user.uuid})}
      formSubmitButtonText={lang('blazervel_workspaces::users.update')}
      formShowBackButton
      formMethod="PUT"
      formFields={fields}/>
  )
}