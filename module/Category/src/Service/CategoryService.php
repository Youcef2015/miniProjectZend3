<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:18
 */
declare(strict_types = 1);


namespace Category\Service;


use Category\Entity\Category;
use Category\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager, CategoryRepository $categoryRepository)
    {
        $this->entityManager   = $entityManager;
        $this->categoryRepository  = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->findAll();
    }

    /**
     * @param int $id
     *
     * @return Category|null
     */
    public function getCategoryById(int $id)
    {
        return $this->categoryRepository->find($id);
    }

    public function create(Category $category)
    {
        $this->entityManager->persist($category);
        $this->entityManager->flush($category);

        return $category;
    }

    public function edit(Category $category)
    {
        $this->entityManager->flush($category);

        return $category;
    }

    public function delete(Category $category)
    {
        try {
            $this->entityManager->remove($category);
            $this->entityManager->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
