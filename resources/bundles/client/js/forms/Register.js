export class Register {
  /**
   * Validation rules
   *
   * @type {Object}
   */
  rules = {
    name: {
      required: true,
      max: 255
    },
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
   * @param {{email?: string, password?: string, remember?: boolean | null}} credentials
   */
  constructor(credentials = {}) {
    this.name = credentials.name || '';
    this.email = credentials.email || '';
    this.password = credentials.password || '';
    this.password_confirmation = '';
  }
}
