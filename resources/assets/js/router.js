
import Vue from 'vue';
import store from './store';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

let menus = []
if(window.sessionStorage.routes){
    menus = JSON.parse(window.sessionStorage.routes) //登录成功返回的菜单
}
store.commit('add_menu',generateMenuItems(menus))

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
        {
            path: '/',
            component: require('./views/Home.vue'),
            children: [
                ...fetchRoutes(store.state.menus.items[0]),
            ]
        },
        {
            path: '/signin',
            component: require('./views/Signin.vue')
        }
    ]
})

function generateMenuItems (menu = [], menuItems = []) {
    for (let i = 0, l = menu.length; i < l; i++) {
        let item = menu[i]
        if (item.route.path) {
            item.route.component = resolve => require([`views/` + item.route.component_path + `.vue`], resolve)
            if (item.children) {
                for (let j = 0, len = item.children.length; j < len; j++) {
                    item.children[j].route.component = resolve => require([`views/` + item.children[j].route.component_path + `.vue`], resolve)
                }
            }
        }
        menuItems.push(item)
    }
    return menuItems
}

function fetchRoutes(menus = []) {
    let routes = [];
    for (let i = 0; i < menus.length; i++) {
        if (menus[i].route.path) {
            routes.push(menus[i].route);
        }
        if (menus[i].children) {
            routes[i].children = fetchRoutes(menus[i].children);
        }
    }
    return routes;
}

router.beforeEach((to, from, next) =>{
    if(to.path == '/signin'){
        next();
    }
    let token = sessionStorage.getItem('token');
    if(token == null){
        next('/signin');
    }
    next();
});

export default router
