<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:41
 */
declare(strict_types = 1);


namespace Actor\Factory;


use Actor\Form\FieldSet\ActorFiledSet;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ActorFieldSetFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get(EntityManager::class);

        return new ActorFiledSet($entityManager);
    }
}
