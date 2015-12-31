<?php
return array(
    'router' => array(
        'routes' => array(
            'leave' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/leave',
                    'defaults' => array(
                        'controller' => 'leave-index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'list-leave' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/list-leave[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'leave-index',
                        'action'     => 'listLeave',
                    ),
                ),
            ), 
            'add-request' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/add-request[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'leave-index',
                        'action'     => 'addRequest',
                    ),
                ),
            ),
            
            'refuse-request' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/refuse[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'leave-index',
                        'action'     => 'refuse',
                    ),
                ),
            ),
            'validate-request' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/validate[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'leave-index',
                        'action'     => 'validate',
                    ),
                ),
            ),
            
            'employee' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/employee[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'leave-index',
                        'action'     => 'employee',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'leave-index' => 'Leave\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'leave' => __DIR__ . '/../view',
        ),
    ),
);