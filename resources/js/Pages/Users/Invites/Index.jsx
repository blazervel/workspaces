import {
  IndexLayout,
  Form,
  Card,
  SectionHeader
} from '@blazervel/components'

export default function ({ workspace, invites }) {

  return (
    <IndexLayout
      pageTitle={lang('blazervelWorkspaces::invites.invites')}
      pageHeadingIcon="user-plus"
      pageBreadcrumbs={[
        {name: lang('blazervelWorkspaces::users.users'),     href: route('workspaces.users.index', {workspace: workspace.uuid})},
        {name: lang('blazervelWorkspaces::invites.invites'), href: route('workspaces.users.invites.index', {workspace: workspace.uuid})},
      ]}
      items={invites}
      itemTitle={(item) => `${item.email} (${item.accepted_at !== null ? 'accepted' : 'pending'})`}
      itemActions={(item) => item.accepted_at === null ? [{
          icon:   'trash',
          method: 'DELETE',
          route:   route('workspaces.users.invites.destroy', {workspace: workspace.uuid, workspaceUserInvite: item.uuid}),
          only:    'invites',
          outline: true,
          sm:      true
      }] : []}
    >
      <Card>
        <SectionHeader
          heading={lang('blazervelWorkspaces::invites.send_new_invite')}
          sm />
        <Form
          className="mt-6"
          route={route('workspaces.users.invites.send', {workspace: workspace.uuid})}
          fields={[{name: 'email', default: '', label: lang('blazervelWorkspaces::invites.email'), type: 'email', required: true}]}
          resetOnSuccess={true}
          formSubmitButtonText={lang('blazervelWorkspaces::invites.send')} />
      </Card>

    </IndexLayout>
  )
}