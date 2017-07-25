<?php
/**
 * User: youcef_l
 * Date: 16/02/2017
 * Time: 15:20
 */
declare(strict_types = 1);


namespace Album\Factory;


use Album\Model\Album;
use Album\Repository\AlbumRepository;
use Album\Service\AlbumService;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AlbumServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /**
         * @var $entityManager \Doctrine\ORM\EntityManager
         */
        $entityManager   = $container->get(EntityManager::class);
        $albumRepository = $entityManager->getRepository(Album::class);

        return new AlbumService($entityManager, $albumRepository);
    }
}
