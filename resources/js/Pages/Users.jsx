import { Head } from '@appModules/@inertiajs/inertia-react'

export default function ({stripeConnector, name, ...props}) {
  return (
    <Sidebar 
      heading="Team"
      navigation={props.navigation}
    >

      <Head title="Team"/>

      <p>Here are your team members!</p>

    </Sidebar>
  )
}