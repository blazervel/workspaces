import { AppLayout } from '@blazervel/components'
import { ButtonPrimary, Input, Label, ValidationErrors, Link } from '@blazervel/components'
import { Head, useForm } from '@appModules/@inertiajs/inertia-react'

export default function () {
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
    <AppLayout>
      <Head title="Create Workspace" />

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