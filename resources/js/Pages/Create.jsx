import { AppLayout } from '@blazervel-ui/components'
import { ButtonPrimary, Input, Label, ValidationErrors } from '@blazervel-ui/components'
import { useForm } from '@pckg/@inertiajs/inertia-react'

export default function ({ navigation, workspace, workspaces, alerts }) {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
  })

  const onHandleChange = (event) => {
    setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value)
  }

  const submit = (e) => {
    e.preventDefault()

    post(route('workspaces.store'))
  }

  return (
    <AppLayout
      navigation={navigation}
      team={workspace}
      teams={workspaces}
      alerts={alerts}
      pageTitle={lang('workspaces.create')}
    >

      <ValidationErrors errors={errors} />

      <form onSubmit={submit}>
        <div>
          <Label forInput="name" value="Name" />
          <Input
              type="text"
              name="name"
              value={data.name}
              className="block w-full mt-1"
              autoComplete="name"
              isFocused={true}
              handleChange={onHandleChange}
              required
          />
        </div>

        <div className="flex justify-end mt-4">
          <ButtonPrimary type="submit" className="ml-4" disabled={processing}>
            Create
          </ButtonPrimary>
        </div>

      </form>
    </AppLayout>
  )
}