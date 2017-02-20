<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 12:19
 */
declare(strict_types = 1);


namespace Film\Factory;


use Doctrine\ORM\EntityManager;
use Film\Entity\Film;
use Film\Repository\FilmRepository;
use Film\Service\FilmService;
use Interop\Container\ContainerInterface;

class FilmServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /**
         * @var EntityManager $entityManager
         */
        $entityManager = $container->get(EntityManager::class);

        /**
         * @var FilmRepository $filmRepository
         */
        $filmRepository = $entityManager->getRepository(Film::class);

       return new FilmService($entityManager, $filmRepository);
    }
}
