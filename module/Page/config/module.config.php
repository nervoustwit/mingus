<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Page\Controller\Page' => 'Page\Controller\PageController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'page' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/page[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Page\Controller\Page',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

	
    'view_manager' => array(
        'template_path_stack' => array(
            'page' => __DIR__ . '/../view',
        ),
    ),
);