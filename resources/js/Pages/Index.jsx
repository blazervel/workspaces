import { IndexLayout } from '@blazervel-ui/components'

export default function ({ navigation, workspace, workspaces, alerts }) {

  const createRoute = route('workspaces.create')

  return (
    <IndexLayout
      navigation={navigation}
      alerts={alerts}
      team={workspace}
      teams={workspaces}
      pageTitle={lang('workspaces.workspaces')}
      pageActions={[{route: createRoute, text: lang('workspaces.add_workspace'), primary: true}]}
      items={workspaces}
      itemsNoneFoundButtonRoute={createRoute}
      itemRoute={(item) => route('workspaces.show', {workspace: item.uuid})}
    />
  )
}