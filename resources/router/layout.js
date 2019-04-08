const layout = [{
        path: '/',
        component: resolve => require(['pages/index2'], resolve),
        meta: {
            title: "Dashboard",
        }
    }, {
        path: '/cronogramas',
        component: resolve => require(['pages/cronogramas-list'], resolve),
        meta: {
            title: "Mini Cursos",
        }
    },
    {
        path: '/cronograma',
        component: resolve => require(['pages/cronogramas-form'], resolve),
        meta: {
            title: "Mini Cursos",
        }
    },
    {
        path: '/cronograma/:id',
        component: resolve => require(['pages/cronogramas-form'], resolve),
        meta: {
            title: "Mini Cursos",
        }
    }, {
        path: '/mini-cursos',
        component: resolve => require(['pages/mini-cursos-list'], resolve),
        meta: {
            title: "Mini Cursos",
        }
    },
    {
        path: '/mini-curso',
        component: resolve => require(['pages/mini-cursos-form'], resolve),
        meta: {
            title: "Mini Cursos",
        }
    },
    {
        path: '/mini-curso/:id',
        component: resolve => require(['pages/mini-cursos-form'], resolve),
        meta: {
            title: "Mini Cursos",
        }
    }, {
        path: '/palestras',
        component: resolve => require(['pages/palestras-list'], resolve),
        meta: {
            title: "Palestras",
        }
    },
    {
        path: '/palestra',
        component: resolve => require(['pages/palestra-form'], resolve),
        meta: {
            title: "Palestras",
        }
    },
    {
        path: '/palestra/:id',
        component: resolve => require(['pages/palestra-form'], resolve),
        meta: {
            title: "Palestras",
        }
    }, {
        path: '/usuarios',
        component: resolve => require(['pages/usuarios-list'], resolve),
        meta: {
            title: "Usuários",
        }
    },
    {
        path: '/usuario',
        component: resolve => require(['pages/usuario-form'], resolve),
        meta: {
            title: "Usuário",
        }
    },
    {
        path: '/usuario/:id',
        component: resolve => require(['pages/usuario-form'], resolve),
        meta: {
            title: "Usuário",
        }
    }, {
        path: '/fotos-galeria',
        component: resolve => require(['pages/gallery-list'], resolve),
        meta: {
            title: "Palestras",
        }
    },
    {
        path: '/foto-galeria',
        component: resolve => require(['pages/gallery-form'], resolve),
        meta: {
            title: "Palestras",
        }
    },
    {
        path: '/foto-galeria/:id',
        component: resolve => require(['pages/gallery-form'], resolve),
        meta: {
            title: "Palestras",
        }
    },
    {
        path: '/links-importantes',
        component: resolve => require(['pages/links-importantes'], resolve),
        meta: {
            title: "Links Importantes",
        }
    },
]

export default layout
