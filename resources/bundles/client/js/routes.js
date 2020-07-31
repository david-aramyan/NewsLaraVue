import AppBar from "./components/AppBar";
import Login from "./pages/auth/Login";
import Register from "./pages/auth/Register";
import NewsShow from "./pages/NewsShow";
import NewsIndex from "./pages/NewsIndex";
import PasswordEmail from "./pages/auth/passwords/Email";
import PasswordReset from "./pages/auth/passwords/Reset";
import PasswordConfirm from "./pages/auth/passwords/Confirm";

const routes = [
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  },
  {
    path: '/password/reset',
    name: 'password.request',
    component: PasswordEmail
  },
  {
    props: true,
    path: '/password/reset/:token',
    name: 'password.reset',
    component: PasswordReset
  },
  {
    name: 'password.confirm',
    path: '/password/confirm',
    component: PasswordConfirm
  },
  {
    path: '/',
    name: 'news.index',
    components: {
      appbar: AppBar,
      default: NewsIndex
    }
  },
  {
    path: '/news/:id(\\d+)',
    name: 'news.show',
    components: {
      appbar: AppBar,
      default: NewsShow
    }
  },
];

export default routes;
