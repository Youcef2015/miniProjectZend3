<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:13
 */
declare(strict_types = 1);


namespace Category\Repository;


use Category\Entity\Category;
use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    /**
     * @return Category[]
     */
    public function getCategories()
    {
        $qb = $this->createQueryBuilder('a')
                   ->addOrderBy('a.title', 'ASC');
        return $qb->getQuery()->getResult();
    }
}
