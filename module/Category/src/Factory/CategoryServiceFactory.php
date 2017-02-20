<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:24
 */
declare(strict_types = 1);


namespace Category\Factory;


use Category\Entity\Category;
use Category\Repository\CategoryRepository;
use Category\Service\CategoryService;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class CategoryServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /**
         * @var EntityManager $entityManager
         */
        $entityManager = $container->get(EntityManager::class);

        /**
         * @var CategoryRepository $categoryRepository
         */
        $categoryRepository = $entityManager->getRepository(Category::class);

        return new CategoryService($entityManager, $categoryRepository);
    }
}
