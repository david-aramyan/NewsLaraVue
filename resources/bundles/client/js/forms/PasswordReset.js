export class PasswordReset {
  /**
   * Validation rules
   *
   * @type {Object}
   */
  rules = {
    email: {
      required: true,
      email: true,
      max: 255
    },
    password: {
      required: true,
      password:'@confirm'
    }
  };

  /**
   * Login Form Constructor
   *
   * @param {{email?: string, password?: string, remember?: boolean | null}} inputs
   */
  constructor(inputs = {}) {
    this.email = inputs.email || '';
    this.password = inputs.password || '';
    this.password_confirmation = '';
  }
}
