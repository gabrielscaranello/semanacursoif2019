/**
 * Define all of your application routes here
 * for more information on routes, see the
 * official documentation https://router.vuejs.org/en/
 */
export default [
    {
        path: '/dashboard',
    // Relative to /src/views
        name: 'Dashboard',
        view: 'Dashboard'
    },
    {
        path: '/cadastro',
        name: 'Cadastro',
        view: 'Register'
    },
    {
        path: '/minicursos',
        name: 'Minicursos',
        view: 'MiniCursos'
    },
    {
        path: '/table-list',
        name: 'Table List',
        view: 'TableList'
    },
    {
        path: '/typography',
        view: 'Typography'
    },
    {
        path: '/icons',
        view: 'Icons'
    },
    {
        path: '/notifications',
        view: 'Notifications'
    }
]
