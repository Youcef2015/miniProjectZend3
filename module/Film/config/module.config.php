<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 10:47
 */

declare(strict_types = 1);

namespace Film;

use Film\Controller\FilmController;
use Film\Factory\AddFilmFormFactory;
use Film\Factory\FilmControllerFactory;
use Film\Factory\FilmFieldSetFactory;
use Film\Factory\FilmServiceFactory;
use Film\Form\AddFilmForm;
use Film\Form\Fieldset\FilmFieldSet;
use Film\Service\FilmService;
use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            FilmController::class => FilmControllerFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'film' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/film[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => Controller\FilmController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'doctrine' => [
        'driver' => [
            'film_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Entity'),
            ],
            'orm_default' => [
                'drivers' => [
                    'Film\Entity' =>  'film_driver',
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            FilmService::class => FilmServiceFactory::class
        ],
    ],

    'form_elements' => [
        'factories' => [
            AddFilmForm::class   => AddFilmFormFactory::class,
            FilmFieldSet::class  => FilmFieldSetFactory::class
        ]
    ],

    'view_manager' => [
        'template_map' => [
            'film/film/index' => __DIR__ . '/../view/film/film/index.phtml',
            'film/film/add' => __DIR__ . '/../view/film/film/add.phtml',
            'film/film/edit' => __DIR__ . '/../view/film/film/edit.phtml',
            'film/film/delete' => __DIR__ . '/../view/film/film/delete.phtml',
        ],
        'template_path_stack' => [
            'film' => __DIR__ . '/../view',
        ],
    ],
];
