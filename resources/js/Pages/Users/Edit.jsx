import { EditLayout } from '@blazervel/ui/components'

export default function ({ workspace, user }) {
  
  const fields = [
    {name: 'name',                  default: user.name,  label: lang('blazervel_workspaces::users.name'),             type: 'text',     required: true},
    {name: 'email',                 default: user.email, label: lang('blazervel_workspaces::users.email'),            type: 'email',    required: true},
    {name: 'password',              default: '',         label: lang('blazervel_workspaces::users.password'),         type: 'password', required: true},
    {name: 'password_confirmation', default: '',         label: lang('blazervel_workspaces::users.confirm_password'), type: 'password', required: true},
  ];

  return (
    <EditLayout
      pageSuperHeading={lang('blazervel_workspaces::users.edit_user')}
      pageHeading={user.name}
      formRoute={route('workspaces.users.update', {workspace: workspace.uuid, user: user})}
      formSubmitButtonText={lang('blazervel_workspaces::users.update')}
      formShowBackButton={true}
      formMethod="PUT"
      formFields={fields}/>
  )
}