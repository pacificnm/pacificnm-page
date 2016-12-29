<?php
return array(
    'module' => array(
        'Page' => array(
            'name' => 'Page',
            'version' => '1.0.3',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/page.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Page\Controller\ConsoleController' => 'Page\Controller\Factory\ConsoleControllerFactory',
            'Page\Controller\CreateController' => 'Page\Controller\Factory\CreateControllerFactory',
            'Page\Controller\DeleteController' => 'Page\Controller\Factory\DeleteControllerFactory',
            'Page\Controller\IndexController' => 'Page\Controller\Factory\IndexControllerFactory',
            'Page\Controller\RestController' => 'Page\Controller\Factory\RestControllerFactory',
            'Page\Controller\UpdateController' => 'Page\Controller\Factory\UpdateControllerFactory',
            'Page\Controller\ViewController' => 'Page\Controller\Factory\ViewControllerFactory'
        )
    ),
    'controller_plugins' => array(
        'factories' => array(
            'pageSetup' => 'Page\Controller\Plugin\Factory\PageSetupFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Page\Mapper\MysqlMapperInterface' => 'Page\Mapper\Factory\MysqlMapperFactory',
            'Page\Service\ServiceInterface' => 'Page\Service\Factory\ServiceFactory',
            'Page\Form\Form' => 'Page\Form\Factory\FormFactory'
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
                        'controller' => 'Page\Controller\CreateController',
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
                        'controller' => 'Page\Controller\DeleteController',
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
                        'controller' => 'Page\Controller\IndexController',
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
                        'controller' => 'Page\Controller\RestController',
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
                        'controller' => 'Page\Controller\UpdateController',
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
                        'controller' => 'Page\Controller\ViewController',
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
                            'controller' => 'Page\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'PageSearchForm' => 'Page\View\Helper\Factory\PageSearchFormFactory'
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
