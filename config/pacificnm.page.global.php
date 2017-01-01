<?php
return array(
    'module' => array(
        'Page' => array(
            'name' => 'Page',
            'version' => '1.0.5',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/page.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\Page\Controller\ConsoleController' => 'Pacificnm\Page\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\Page\Controller\CreateController' => 'Pacificnm\Page\Controller\Factory\CreateControllerFactory',
            'Pacificnm\Page\Controller\DeleteController' => 'Pacificnm\Page\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\Page\Controller\IndexController' => 'Pacificnm\Page\Controller\Factory\IndexControllerFactory',
            'Pacificnm\Page\Controller\RestController' => 'Pacificnm\Page\Controller\Factory\RestControllerFactory',
            'Pacificnm\Page\Controller\UpdateController' => 'Pacificnm\Page\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\Page\Controller\ViewController' => 'Pacificnm\Page\Controller\Factory\ViewControllerFactory'
        )
    ),
    'controller_plugins' => array(
        'factories' => array(
            'pageSetup' => 'Pacificnm\Page\Controller\Plugin\Factory\PageSetupFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\Page\Mapper\MysqlMapperInterface' => 'Pacificnm\Page\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\Page\Service\ServiceInterface' => 'Pacificnm\Page\Service\Factory\ServiceFactory',
            'Pacificnm\Page\Form\Form' => 'Pacificnm\Page\Form\Factory\FormFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'page-create' => array(
                'pageTitle' => 'Page',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'page-index',
                'layout' => 'admin',
                'icon' => 'fa fa-gears',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/page/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Page\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'page-delete' => array(
                'pageTitle' => 'Page',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'page-index',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/page/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Page\Controller\DeleteController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'page-index' => array(
                'pageTitle' => 'Page',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'page-index',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/page',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Page\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'page-rest' => array(
                'pageTitle' => 'Page',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'page-index',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/page[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Page\Controller\RestController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'page-update' => array(
                'pageTitle' => 'Page',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'page-index',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/page/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Page\Controller\UpdateController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'page-view' => array(
                'pageTitle' => 'Page',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'page-index',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/page/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Page\Controller\ViewController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'page-console' => array(
                    'options' => array(
                        'route' => 'page',
                        'defaults' => array(
                            'controller' => 'Pacificnm\Page\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\Page' => true
        ),
        'template_map' => array(
            'pacificnm/page/create/index' => __DIR__ . '/../view/page/create/index.phtml',
            'pacificnm/page/delete/index' => __DIR__ . '/../view/page/delete/index.phtml',
            'pacificnm/page/index/index' => __DIR__ . '/../view/page/index/index.phtml',
            'pacificnm/page/update/index' => __DIR__ . '/../view/page/update/index.phtml',
            'pacificnm/page/view/index' => __DIR__ . '/../view/page/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'PageSearchForm' => 'Pacificnm\Page\View\Helper\Factory\PageSearchFormFactory'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'user' => array(),
            'administrator' => array(
                'page-create',
                'page-delete',
                'page-index',
                'page-update',
                'page-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'name' => 'Admin',
                'route' => 'admin-index',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'location' => 'left',
                'active' => true,
                'items' => array(
                    array(
                        'name' => 'Pages',
                        'route' => 'page-index',
                        'icon' => 'fa fa-gear',
                        'order' => 8,
                        'active' => true
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Page',
                        'route' => 'page-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'page-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'page-update',
                                        'useRouteMatch' => true
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'page-delete',
                                        'useRouteMatch' => true
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'page-create',
                                'useRouteMatch' => true
                            )
                        )
                    )
                )
            )
        )
    )
);
