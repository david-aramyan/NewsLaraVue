export class PasswordConfirm {
  /**
   * Validation rules
   *
   * @type {Object}
   */
  rules = {
    password: {
      required: true,
    }
  };

  /**
   * Login Form Constructor
   */
  constructor() {
    this.password = '';
  }
}
