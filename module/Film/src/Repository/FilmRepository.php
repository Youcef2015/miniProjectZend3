<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 11:03
 */
declare(strict_types = 1);


namespace Film\Repository;


use Doctrine\ORM\EntityRepository;
use Film\Entity\Film;

class FilmRepository extends EntityRepository
{
    public function getFilms()
    {
        /**
         * @return Film[]
         */
        $qb = $this->createQueryBuilder('a')
                   ->addOrderBy('a.title', 'ASC');
        return $qb->getQuery()->getResult();
    }
}
