export class PasswordRequest {
  rules = {
    email: {
      required: true,
      email: true,
      max: 255
    }
  }

  constructor(inputs = {}) {
    this.email = inputs.email || '';
  }
}
