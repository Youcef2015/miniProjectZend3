<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 14:54
 */


declare(strict_types = 1);

namespace Category;

use Category\Controller\CategoryController;
use Category\Factory\AddCategoryFormFactory;
use Category\Factory\CategoryControllerFactory;
use Category\Factory\CategoryFieldSetFactory;
use Category\Factory\CategoryServiceFactory;
use Category\Form\AddCategoryForm;
use Category\Form\Fieldset\CategoryFieldSet;
use Category\Service\CategoryService;
use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'controllers' => [
        'factories' => [
            CategoryController::class => CategoryControllerFactory::class
        ],
    ],

    'router' => [
        'routes' => [
            'category' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/category[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'doctrine' => [
        'driver' => [
            'category_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Entity'),
            ],
            'orm_default' => [
                'drivers' => [
                    'Category\Entity' =>  'category_driver',
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            CategoryService::class => CategoryServiceFactory::class,
        ],
    ],

    'form_elements' => [
        'factories' => [
            AddCategoryForm::class   => AddCategoryFormFactory::class,
            CategoryFieldSet::class  => CategoryFieldSetFactory::class
        ]
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
