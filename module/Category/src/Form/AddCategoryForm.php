<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:27
 */
declare(strict_types = 1);


namespace Category\Form;


use Category\Form\Fieldset\CategoryFieldSet;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class AddCategoryForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('category');
    }

    public function init()
    {
        $this->add(
            [
                'name'       => 'category',
                'type'       => CategoryFieldSet::class,
                'options' => [
                    'use_as_base_fieldset' => true,
                ],
            ]
        );

        $this->setValidationGroup(
            [
                'category' => [
                    'id',
                    'title'
                ]
            ]
        );

        $this->add(
            [
                'name'       => 'submit',
                'type'       => Submit::class,
                'attributes' => [
                    'value' => 'Add',
                    'id'    => 'submitbutton',
                ],
            ]
        );
    }
}
