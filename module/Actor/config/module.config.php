<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 16:45
 */

declare(strict_types = 1);

namespace Actor;


use Actor\Controller\ActorController;
use Actor\Factory\ActorControllerFactory;
use Actor\Factory\ActorFieldSetFactory;
use Actor\Factory\ActorServiceFactory;
use Actor\Factory\AddActorFormFactory;
use Actor\Form\AddActorForm;
use Actor\Form\FieldSet\ActorFiledSet;
use Actor\Service\ActorService;
use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'controllers' => [
        'factories' => [
            ActorController::class => ActorControllerFactory::class
        ],
    ],

    'router' => [
        'routes' => [
            'actor' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/actor[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => Controller\ActorController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'doctrine' => [
        'driver' => [
            'actor_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Entity'),
            ],
            'orm_default' => [
                'drivers' => [
                    'Actor\Entity' =>  'actor_driver',
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            ActorService::class => ActorServiceFactory::class
        ],
    ],

    'form_elements' => [
        'factories' => [
            AddActorForm::class  => AddActorFormFactory::class,
            ActorFiledSet::class => ActorFieldSetFactory::class
        ]
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
