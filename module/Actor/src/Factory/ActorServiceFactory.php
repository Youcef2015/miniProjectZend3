<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:25
 */
declare(strict_types = 1);


namespace Actor\Factory;


use Actor\Entity\Actor;
use Actor\Service\ActorService;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class ActorServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /**
         * @var $entityManager \Doctrine\ORM\EntityManager
         */
        $entityManager   = $container->get(EntityManager::class);
        $actorRepository = $entityManager->getRepository(Actor::class);

        return new ActorService($entityManager, $actorRepository);
    }
}
