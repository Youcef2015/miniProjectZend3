<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:28
 */
declare(strict_types = 1);


namespace Category\Factory;


use Category\Form\AddCategoryForm;
use Interop\Container\ContainerInterface;

class AddCategoryFormFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AddCategoryForm();
    }
}
