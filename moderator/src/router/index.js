/**
 * Vue Router
 *
 * @library
 *
 * https://router.vuejs.org/en/
 */

// Lib imports
import Vue from 'vue'
import VueAnalytics from 'vue-analytics'
import Router from 'vue-router'
import Meta from 'vue-meta'
import as from './as'

// Routes
import paths from './paths'

function route(path, view, name) {
    return {
        name: name || view,
        path,
        component: resolve => import(
            `@/views/${view}.vue`
        ).then(resolve)
    }
}

Vue.use(Router)

// Create a new router
const router = new Router({
    routes: paths.map(path => route(path.path, path.view, path.name)).concat([{
        path: '*',
        redirect: '/login'
    }]),
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        }
        if (to.hash) {
            return {
                selector: to.hash
            }
        }
        return {
            x: 0,
            y: 0
        }
    }
})

Vue.use(Meta)

// Bootstrap Analytics
// Set in .env
// https://github.com/MatteoGabriele/vue-analytics
if (process.env.GOOGLE_ANALYTICS) {
    Vue.use(VueAnalytics, {
        id: process.env.GOOGLE_ANALYTICS,
        router,
        autoTracking: {
            page: process.env.NODE_ENV !== 'development'
        }
    })
}

router.beforeEach((to, from, next) => {
    as.check().then((auth) => {
        if (!auth) {
            if (to.path === '/login') {
                return next()
            }
            return next('/login')
        }
        return next()
    })
})

export default router
