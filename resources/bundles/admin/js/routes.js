import AppBar from "./components/AppBar";
import NavBar from "./components/NavBar";

import Login from "./pages/auth/Login";
import Dashboard from "./pages/Dashboard";
import NewsIndex from "./pages/news/Index";
import NewsCreate from "./pages/news/Create";
import NewsUpdate from "./pages/news/Update";

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
      default: NewsIndex
    }
  },
  {
    path: '/news/create',
    name: 'admin.news.create',
    components: {
      appbar: AppBar,
      navbar: NavBar,
      default: NewsCreate
    }
  },
  {
    path: '/news/:id(\\d+)/edit',
    name: 'admin.news.edit',
    components: {
      appbar: AppBar,
      navbar: NavBar,
      default: NewsUpdate
    }
  },
];

export default routes;
