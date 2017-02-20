<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:29
 */
declare(strict_types = 1);


namespace Actor\Form;


use Actor\Form\FieldSet\ActorFiledSet;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class AddActorForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct();
    }

    public function init()
    {
        $this->add(
            [
                'name'       => 'actor',
                'type'       => ActorFiledSet::class,
                'options' => [
                    'use_as_base_fieldset' => true,
                ],
            ]
        );

        $this->setValidationGroup(
            [
                'blog' => [
                    'id',
                    'title',
                    'text',
                    'album',
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
