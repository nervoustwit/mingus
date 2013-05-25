<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Pages\Controller\Pages' => 'Pages\Controller\PagesController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pages[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Pages\Controller\Pages',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

	
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);