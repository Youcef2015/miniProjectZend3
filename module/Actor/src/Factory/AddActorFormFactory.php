<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:44
 */
declare(strict_types = 1);


namespace Actor\Factory;


use Actor\Form\AddActorForm;
use Interop\Container\ContainerInterface;

class AddActorFormFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AddActorForm();
    }
}
