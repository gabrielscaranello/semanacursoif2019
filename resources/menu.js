const menu_items = [{
        name: 'Dashboard',
        icon: 'fa fa-home',
        link: '/',
    }, {
        name: 'Mini Cursos',
        icon: 'fa fa-info',
        child: [{
            name: 'Gerenciar',
            link: '/mini-cursos',
            icon: 'fa fa-cogs'
        }, {
            name: 'Cadastrar',
            link: '/mini-curso',
            icon: 'fa fa-plus'
        }]
    }, {
        name: 'Cronograma',
        icon: 'fa fa-info',
        child: [{
            name: 'Gerenciar',
            link: '/cronogramas',
            icon: 'fa fa-cogs'
        }, {
            name: 'Cadastrar',
            link: '/cronograma',
            icon: 'fa fa-plus'
        }]
    },
    {
        name: 'Palestras',
        icon: 'fa fa-ticket',
        child: [{
            name: 'Gerenciar',
            link: '/palestras',
            icon: 'fa fa-cogs'
        }, {
            name: 'Cadastrar',
            link: '/palestra',
            icon: 'fa fa-plus'
        }]
    },
    {
        name: 'Galeria',
        icon: 'fa fa-photo',
        child: [{
            name: 'Gerenciar',
            link: '/fotos-galeria',
            icon: 'fa fa-cogs'
        }, {
            name: 'Cadastrar',
            link: '/foto-galeria',
            icon: 'fa fa-plus'
        }]
    },
    {
        name: 'Usuários',
        icon: 'fa fa-users',
        child: [{
            name: 'Gerenciar',
            link: '/usuarios',
            icon: 'fa fa-cogs'
        }, {
            name: 'Cadastrar',
            link: '/usuario',
            icon: 'fa fa-plus'
        }]
    },
    {
        name: 'Links Úteis',
        icon: 'fa fa-photo',
        link: 'links-importantes',
    },
];
export default menu_items;
