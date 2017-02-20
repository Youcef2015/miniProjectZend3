<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 12:01
 */
declare(strict_types = 1);


namespace Film\Factory;


use Film\Form\AddFilmForm;
use Interop\Container\ContainerInterface;

class AddFilmFormFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AddFilmForm();
    }
}
