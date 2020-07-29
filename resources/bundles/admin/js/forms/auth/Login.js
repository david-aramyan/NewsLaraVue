export class Login {
  /** @type {string} **/
  login = '';

  /** @type {string} **/
  password = '';

  /** @type {boolean | null} **/
  remember = false;

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
    username: {
      required: true,
      alpha_dash: true,
      max: 255
    },
    password: {
      required: true,
    }
  };

  regexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

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
