<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:34
 */
declare(strict_types = 1);


namespace Actor\Form\FieldSet;


use Actor\Entity\Actor;
use Doctrine\ORM\EntityManager;
use Zend\Filter\StringToUpper;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Validator\StringLength;

class ActorFiledSet extends Fieldset implements InputFilterProviderInterface
{

    private $objectManager;

    public function __construct(EntityManager $objectManager)
    {
        $this->objectManager = $objectManager;
        parent::__construct();
    }

    public function init()
    {
        $this->setHydrator(new DoctrineHydrator($this->objectManager))
             ->setObject(new Actor());

        $this->add(
            [
                'name' => 'id',
                'type' => Hidden::class,
            ]
        );
        $this->add(
            [
                'name'    => 'firstName',
                'type'    => Text::class,
                'options' => [
                    'label' => 'Nom',
                ],
            ]
        );
        $this->add(
            [
                'name'    => 'lastName',
                'type'    => Text::class,
                'options' => [
                    'label' => 'Prénom',
                ],
            ]
        );
        $this->add(
            [
                'name'    => 'sex',
                'type'    => Text::class,
                'options' => [
                    'label' => 'Sexe',
                ],
            ]
        );
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'id' => [
                'require' => true,
                'filters' => [
                    ['name' => ToInt::class ]
                ]
            ],
            'firstName' => [
                'require' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => StringToUpper::class],
                ],
                'validators' => [
                    [
                        'name'    => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ],
                    ],
                ]
            ],
            'lastName' => [
                'require' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    [
                        'name'    => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                        ],
                    ],
                ]
            ],
            'sex' => [
                'require' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    [
                        'name'    => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                        ],
                    ],
                ]
            ],
        ];
    }
}
