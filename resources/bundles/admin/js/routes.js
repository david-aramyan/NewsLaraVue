import AppBar from "./components/AppBar";
import NavBar from "./components/NavBar";

import Login from "./pages/auth/Login";
import Dashboard from "./pages/Dashboard";
import PostsIndex from "./pages/posts/Index";
import PostsCreate from "./pages/posts/Create";
import PostsUpdate from "./pages/posts/Update";

const routes = [
  {
    path: '/login',
    name: 'admin.login',
    component: Login
  },
  {
    path: '/dashboard',
    name: 'admin.dashboard',
    components: {
      appbar: AppBar,
      navbar: NavBar,
      default: Dashboard
    }
  },
  {
    path: '/news',
    name: 'admin.news.index',
    components: {
      appbar: AppBar,
      navbar: NavBar,
      default: PostsIndex
    }
  },
  {
    path: '/news/create',
    name: 'admin.news.create',
    components: {
      appbar: AppBar,
      navbar: NavBar,
      default: PostsCreate
    }
  },
  {
    path: '/news/:id(\\+d)',
    name: 'admin.news.update',
    components: {
      appbar: AppBar,
      navbar: NavBar,
      default: PostsUpdate
    }
  },
];

export default routes;
