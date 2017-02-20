<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 11:25
 */
declare(strict_types = 1);


namespace Film\Form;

;
use Film\Form\Fieldset\FilmFieldSet;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class AddFilmForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('film');
    }

    public function init()
    {
        $this->add(
            [
                'name'       => 'film',
                'type'       => FilmFieldSet::class,
                'options' => [
                    'use_as_base_fieldset' => true,
                ],
            ]
        );

        $this->setValidationGroup(
            [
                'film' => [
                    'id',
                    'synopsis',
                    'genre',
                    'title',
                    'director',
                    'date_release'
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
