<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:46
 */
declare(strict_types = 1);


namespace Category\Form\Fieldset;


use Category\Entity\Category;
use Doctrine\ORM\EntityManager;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Validator\StringLength;

class CategoryFieldSet extends Fieldset implements InputFilterProviderInterface
{
    private $objectManger;

    public function __construct(EntityManager $objectManager)
    {
        $this->objectManger = $objectManager;
        parent::__construct();
    }

    public function init()
    {
        $this->setHydrator(new DoctrineHydrator($this->objectManger))
             ->setObject(new Category());

        $this->add(
            [
                'name' => 'id',
                'type' => Hidden::class
            ]
        );
        $this->add(
            [
                'name'    => 'title',
                'type'    => Text::class,
                'options' => [
                    'label' => 'Titre',
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
