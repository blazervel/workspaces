import { IndexLayout } from '@blazervel/ui/components'

export default function ({ workspaces }) {

  const createRoute = route('workspaces.create')

  return (
    <IndexLayout
      pageTitle={lang('blazervel_workspaces::workspaces.workspaces')}
      pageActions={[{route: createRoute, text: lang('blazervel_workspaces::workspaces.add_workspace'), primary: true}]}
      items={workspaces}
      itemsNoneFoundRoute={createRoute}
      itemRoute={(item) => route('workspaces.show', {workspace: item.uuid})}
    />
  )
}