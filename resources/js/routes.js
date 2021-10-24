import Home from './components/HomeComponent';
import Register from './components/RegisterComponent';
import Login from './components/LoginComponent';
import Dashboard from './components/DashboardComponent';


export default {
    mode: 'history',
    linkActiveClass: "active",
    routes: [
        {
            name: 'Home',
            path: '/DoorInApi/public/',
            component: Home
        },
        {
            name: 'Register',
            path: '/DoorInApi/public/enregistrement',
            component: Register
        },
        {
            name: 'Login',
            path: '/DoorInApi/public/connexion',
            component: Login
        },
        {
            name: 'Dashboard',
            path: '/DoorInApi/public/dashboard',
            component: Dashboard,
            beforeEnter: (to, from, next) => {
                let url = document.head.querySelector('meta[name="url"]').content;
                let fullurl = url + `/api/authenticated`;
                axios.get(fullurl).then(() => {
                    next()
                }).catch(() => {
                    return next({name: 'Login'})
                })
            }
        },
    ]
}
