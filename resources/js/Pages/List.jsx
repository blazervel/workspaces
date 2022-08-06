import { IndexLayout } from '@blazervel/components'

export default function List({ workspaces }) {

  const createRoute = route('workspaces.create')

  return (
    <IndexLayout
      pageTitle={lang('workspaces.workspaces')}
      pageActions={[{route: createRoute, text: lang('workspaces.add_workspace'), primary: true}]}
      items={workspaces}
      itemsNoneFoundRoute={createRoute}
      itemRoute={(item) => route('workspaces.show', {workspace: item.uuid})}
    />
  )
}