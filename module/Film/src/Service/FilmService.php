<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 12:11
 */
declare(strict_types = 1);


namespace Film\Service;


use Doctrine\ORM\EntityManager;
use Film\Entity\Film;
use Film\Repository\FilmRepository;

class FilmService implements FilmServiceInterface
{
    /**
     * @var FilmRepository
     */
    private $filmRepository;
    /**
     * @var EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager, FilmRepository $filmRepository)
    {
        $this->entityManager   = $entityManager;
        $this->filmRepository  = $filmRepository;
    }

    public function getAllFilms()
    {
        return $this->filmRepository->findAll();
    }

    /**
     * @param int $id
     *
     * @return Album|null
     */
    public function getFilmById(int $id)
    {
        return $this->filmRepository->find($id);
    }

    public function create(Film $film)
    {
        $this->entityManager->persist($film);
        $this->entityManager->flush($film);

        return $film;
    }

    public function edit(Film $film)
    {
        $this->entityManager->flush($film);

        return $film;
    }

    public function delete(Film $film)
    {
        try {
            $this->entityManager->remove($film);
            $this->entityManager->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
