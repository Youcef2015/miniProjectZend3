<?php
declare(strict_types = 1);

namespace Album;

use Album\Controller\AlbumController;
use Album\Factory\AddAlbumFormFactory;
use Album\Factory\AlbumControllerFactory;
use Album\Factory\AlbumFieldSetFactory;
use Album\Factory\AlbumFormFactory;
use Album\Factory\AlbumServiceFactory;
use Album\Form\AddAlbumForm;
use Album\Form\AlbumForm;
use Album\Form\Fieldset\AlbumFieldSet;
use Album\Service\AlbumService;
use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'controllers' => [
        'factories' => [
            AlbumController::class => AlbumControllerFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Model'
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            AlbumService::class  => AlbumServiceFactory::class
        ],
    ],

    'form_elements' => [
        'factories' => [
            AddAlbumForm::class  => AddAlbumFormFactory::class,
            AlbumFieldSet::class => AlbumFieldSetFactory::class
        ]
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
