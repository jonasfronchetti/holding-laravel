<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Novum',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Novum</b>',

    'logo_mini' => '<b>Novum</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue-light',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'CONFIGURAÇÕES DA CONTA',
        [
            'text'    => 'Administração',
            'icon'    => 'cog',
            'can' => 'admin_access',
            //'label'       => 3,
            //'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Permissões',
                    'url'  => 'admin/permissions',
                    'icon'    => 'expeditedssl',
                    'can' => 'permission_access',
                ],
                [
                    'text' => 'Funções',
                    'url'  => 'admin/roles',
                    'icon'    => 'group',
                    'can' => 'role_access',
                ],
                [
                    'text' => 'Usuários',
                    'url'  => 'admin/users',
                    'icon'    => 'user',
                    'can' => 'user_access',
                ],
                [
                    'text' => 'Empresa',
                    'url'  => 'admin/empresas',
                    'icon'    => 'institution',
                    'can' => 'empresa_access',
                ],
            ],
        ],
        'NAVEGAÇÃO PRINCIPAL',
        [
            'text'    => 'Basico',
            'icon'    => 'bars',
            'label_color' => 'success',
            'can' => 'basico_access',
            'submenu' => [
                [
                    'text' => 'Pessoas',
                    'url'  => 'basico/pessoas',
                    'icon'    => 'users',
                    'can' => 'pessoa_access',
                ],
                [
                    'text' => 'Configurações',
                    'url'  => 'basico/configuracoes',
                    'icon'    => 'cogs',
                    'can' => 'configuracao_access',
                ],
            ],
        ],
        [
            'text'    => 'Financeiro',
            'icon'    => 'bar-chart',
            'label_color' => 'success',
            'can' => 'financeiro_access',
            'submenu' => [
                [
                    'text' => 'Aplicações',
                    'url'  => 'financeiro/aplicacoes',
                    'icon'    => 'file-text-o',
                    'can' => 'aplicacao_access',
                ],
                [
                    'text' => 'Aportes',
                    'url'  => 'financeiro/aportes',
                    'icon'    => 'money',
                    'can' => 'aporte_access',
                ],
                [
                    'text' => 'Garantias',
                    'url'  => 'financeiro/garantias',
                    'icon'    => 'building-o',
                    'can' => 'garantia_access',
                ],
                [
                    'text' => 'Fundo de Investimentos',
                    'url'  => 'financeiro/fundoinvestimentos',
                    'icon'    => 'usd',
                    'can' => 'fundo_investimento_access',
                ],
                [
                    'text' => 'Investimentos',
                    'url'  => 'financeiro/investimentos',
                    'icon'    => 'btc',
                    'can' => 'investimento_access',
                ],
                [
                    'text' => 'Despesas',
                    'url'  => 'financeiro/despesas',
                    'icon'    => 'balance-scale',
                    'can' => 'despesa_access',
                ],
                [
                    'text' => 'Tipos de Despesas',
                    'url'  => 'financeiro/tipodespesas',
                    'icon'    => 'tasks',
                    'can' => 'tipodespesa_access',
                ],
            ],
        ],
        [
            'text' => 'Painel',
            'url'  => 'financeiro/painel',
            'icon'    => 'desktop',
            'can' => 'cliente_painel',
        ],
        [
            'text' => 'Aporte',
            'url'  => 'financeiro/aporte',
            'icon'    => 'money',
            'can' => 'cliente_aporte',
        ],
        [
            'text' => 'Extrato',
            'url'  => 'financeiro/extrato',
            'icon'    => 'list-alt',
            'can' => 'cliente_extrato',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
