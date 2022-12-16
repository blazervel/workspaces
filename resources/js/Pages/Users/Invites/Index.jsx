import {
  IndexLayout,
  Card,
  SectionHeader
} from '@blazervel-ui/components'
import { Form } from '@ja-inertia/components'

export default function ({ workspace, workspaces, navigation, alerts, invites }) {

  return (
    <IndexLayout
      navigation={navigation}
      team={workspace}
      teams={workspaces}
      alerts={alerts}
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
      <Card className="mt-6">
        <SectionHeader
          heading={lang('blazervel_workspaces::invites.send_new_invite')}
          sm />
        <Form
          className="mt-6"
          route={route('workspaces.users.invites.send', {workspace: workspace.uuid})}
          fields={[{name: 'email', value: '', label: lang('blazervel_workspaces::invites.email'), type: 'email', required: true}]}
          clearOnSuccess={true}
          formSubmitButtonText={lang('blazervel_workspaces::invites.send')} />
      </Card>

    </IndexLayout>
  )
}