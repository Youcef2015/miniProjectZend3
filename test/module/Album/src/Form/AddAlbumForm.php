<?php
/**
 * User: orkin
 * Date: 15/02/2017
 * Time: 10:08
 */
declare(strict_types = 1);


namespace Album\Form;

use Album\Form\Fieldset\AlbumFieldSet;
use Zend\Form\Element\Submit;
use Zend\Form\Form;


class AddAlbumForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('album');
    }

    public function init()
    {
        $this->add(
            [
                'name'       => 'album',
                'type'       => AlbumFieldSet::class,
                'options' => [
                    'use_as_base_fieldset' => true,
                ],
            ]
        );

        $this->setValidationGroup(
            [
                'album' => [
                    'id',
                    'artist',
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
