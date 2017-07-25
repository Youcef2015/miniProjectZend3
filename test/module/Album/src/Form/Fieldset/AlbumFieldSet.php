<?php
/**
 * User: youcef_l
 * Date: 16/02/2017
 * Time: 15:46
 */
declare(strict_types = 1);


namespace Album\Form\Fieldset;


use Album\Model\Album;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Filter\StringToUpper;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;

class AlbumFieldSet extends Fieldset implements InputFilterProviderInterface
{
    private $objectManager;

    public function __construct(EntityManager $objectManager)
    {
        $this->objectManager = $objectManager;
        parent::__construct('album');
    }

    public function init()
    {
        $this->setHydrator(new DoctrineHydrator($this->objectManager))
             ->setObject(new Album());

        $this->add(
            [
                'name' => 'id',
                'type' => Hidden::class,
            ]
        );
        $this->add(
            [
                'name'    => 'title',
                'type'    => Text::class,
                'options' => [
                    'label' => 'Title',
                ],
            ]
        );
        $this->add(
            [
                'name'    => 'artist',
                'type'    => Text::class,
                'options' => [
                    'label' => 'Artist',
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
            'artist' => [
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
            'title' => [
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
                            'max'      => 100,
                        ],
                    ],
                ]
            ]
        ];
    }
}
