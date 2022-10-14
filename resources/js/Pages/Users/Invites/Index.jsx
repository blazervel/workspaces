import {
  IndexLayout,
  Form,
  Card,
  SectionHeader
} from '@blazervel/ui/components'

export default function ({ workspace, invites }) {

  return (
    <IndexLayout
      pageTitle={lang('blazervel_workspaces::invites.invites')}
      pageHeadingIcon="user-plus"
      pageBreadcrumbs={[
        {name: lang('blazervel_workspaces::users.users'),     href: route('workspaces.users.index', {workspace: workspace.uuid})},
        {name: lang('blazervel_workspaces::invites.invites'), href: route('workspaces.users.invites.index', {workspace: workspace.uuid})},
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
          heading={lang('blazervel_workspaces::invites.send_new_invite')}
          sm />
        <Form
          className="mt-6"
          route={route('workspaces.users.invites.send', {workspace: workspace.uuid})}
          fields={[{name: 'email', value: '', label: lang('blazervel_workspaces::invites.email'), type: 'email', required: true}]}
          resetOnSuccess={true}
          formSubmitButtonText={lang('blazervel_workspaces::invites.send')} />
      </Card>

    </IndexLayout>
  )
}