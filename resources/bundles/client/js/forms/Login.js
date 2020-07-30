export class Login {
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
    }
  };

  /**
   * Login Form Constructor
   *
   * @param {{email?: string, password?: string, remember?: boolean | null}} credentials
   */
  constructor(credentials = {}) {
    this.email = credentials.email || '';
    this.password = credentials.password || '';
    this.remember = credentials.remember || false;
  }
}
