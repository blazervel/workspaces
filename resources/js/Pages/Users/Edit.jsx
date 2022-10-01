import { EditLayout } from '@blazervel/components'

export default function ({ workspace, user }) {
  
  const fields = [
    {name: 'name',                  default: user.name,  label: lang('blazervelWorkspaces::users.name'),             type: 'text',     required: true},
    {name: 'email',                 default: user.email, label: lang('blazervelWorkspaces::users.email'),            type: 'email',    required: true},
    {name: 'password',              default: '',         label: lang('blazervelWorkspaces::users.password'),         type: 'password', required: true},
    {name: 'password_confirmation', default: '',         label: lang('blazervelWorkspaces::users.confirm_password'), type: 'password', required: true},
  ];

  return (
    <EditLayout
      pageSuperHeading={lang('blazervelWorkspaces::users.edit_user')}
      pageHeading={user.name}
      formRoute={route('workspaces.users.update', {workspace: workspace.uuid, user: user})}
      formSubmitButtonText={lang('blazervelWorkspaces::users.update')}
      formShowBackButton={true}
      formMethod="PUT"
      formFields={fields}/>
  )
}