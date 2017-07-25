<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 16:53
 */
declare(strict_types = 1);


namespace Actor\Repository;


use Doctrine\ORM\EntityRepository;

class ActorRepository extends EntityRepository
{
    public function getActors()
    {
        /**
         * @return Actor[]
         */
        $qb = $this->createQueryBuilder('a')
                   ->addOrderBy('a.lastName', 'ASC');
        return $qb->getQuery()->getResult();
    }
}
