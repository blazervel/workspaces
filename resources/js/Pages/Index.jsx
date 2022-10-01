import { IndexLayout } from '@blazervel/components'

export default function ({ workspaces }) {

  const createRoute = route('workspaces.create')

  return (
    <IndexLayout
      pageTitle={lang('blazervelWorkspaces::workspaces.workspaces')}
      pageActions={[{route: createRoute, text: lang('blazervelWorkspaces::workspaces.add_workspace'), primary: true}]}
      items={workspaces}
      itemsNoneFoundRoute={createRoute}
      itemRoute={(item) => route('workspaces.show', {workspace: item.uuid})}
    />
  )
}