<?php
/**
 * User: youcef_l
 * Date: 16/02/2017
 * Time: 11:43
 */
declare(strict_types = 1);


namespace Album\Factory;


use Album\Form\AddAlbumForm;
use Interop\Container\ContainerInterface;

class AddAlbumFormFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AddAlbumForm();
    }
}
