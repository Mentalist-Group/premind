import { required, email, min, max } from 'vee-validate/dist/rules'
import { extend } from 'vee-validate'

extend('required', {
  ...required,
  message: 'This field is required',
})

extend('min', {
  ...min,
  message: 'This field must be {length} characters or more',
})

extend('max', {
  ...max,
  message: 'This field must be {length} characters or less',
})

extend('email', {
  ...email,
  message: 'This field must be a valid email',
})
