import { extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/en.json';

Object.keys(rules).forEach(rule => extend(rule, { ...rules[rule], message: messages[rule] }));

const meta = document.head.querySelector('meta[name="csrf-token"]');
const app = document.getElementById('app');

const csrf = meta.getAttribute('content');
const auth = JSON.parse(app.dataset.auth);

app.removeAttribute('data-auth');

const go = function (name, params = {}, query = {}) {
  return this.$router.resolve({name, params, query}).href;
};

const redirect = href => window.location.replace(href);


export { auth, csrf, go, redirect };
