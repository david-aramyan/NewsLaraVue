// window.axios = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { extend } from 'vee-validate';
import { isString, isArray, isBoolean } from "./validators";
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/en.json';

Object.keys(rules).forEach(rule => extend(rule, { ...rules[rule], message: messages[rule] }));

extend('string', {
  validate: isString,
  message: 'The {_field_} field must a string.'
});

extend('array', {
  validate: isArray,
  message: 'The {_field_} field must an array.'
});

extend('boolean', {
  validate: isBoolean,
  message: 'The {_field_} field must a boolean.'
});

const meta = document.head.querySelector('meta[name="csrf-token"]');
const app = document.getElementById('app');

const csrf = meta.getAttribute('content');
const auth = JSON.parse(app.dataset.auth);

app.removeAttribute('data-auth');

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

/**
 * Resolving route url
 *
 * @param {string} name
 * @param {Object} params
 * @param {Object} query
 * @returns {string}
 */
const go = function (name, params = {}, query = {}) {
  return this.$router.resolve({name, params, query}).href;
};

export { auth, csrf, go};
