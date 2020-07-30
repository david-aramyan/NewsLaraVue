import AppBar from "./components/AppBar";
import Login from "./pages/auth/Login";
import Register from "./pages/auth/Register";
import NewsShow from "./pages/NewsShow";
import NewsIndex from "./pages/NewsIndex";

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
