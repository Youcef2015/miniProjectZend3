<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:50
 */
declare(strict_types = 1);


namespace Category\Factory;


use Category\Form\Fieldset\CategoryFieldSet;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CategoryFieldSetFactory implements FactoryInterface
{
   public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
   {
       $entityManager = $container->get(EntityManager::class);

       return new CategoryFieldSet($entityManager);
   }
}
