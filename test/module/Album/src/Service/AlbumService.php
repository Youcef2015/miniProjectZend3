<?php
/**
 * User: youcef_l
 * Date: 16/02/2017
 * Time: 13:58
 */
declare(strict_types = 1);


namespace Album\Service;


use Album\Model\Album;
use Album\Repository\AlbumRepository;
use Doctrine\ORM\EntityManager;

class AlbumService implements AlbumServiceInterface
{
    /*
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var $albumRepository
     */
    private $albumRepository;

    public function __construct(EntityManager $entityManager, AlbumRepository  $albumRepository)
    {
        $this->entityManager = $entityManager;
        $this->albumRepository = $albumRepository;
    }

    public function getAllAlbums()
    {
        return $this->albumRepository->findAll();
    }

    public function create(Album $album): Album
    {
        $this->entityManager->persist($album);
        $this->entityManager->flush($album);

        return $album;
    }

    public function edit(Album $album): Album
    {
       $this->entityManager->flush($album);

       return $album;
    }

    public function delete(Album $album): bool
    {
        try {
            $this->entityManager->remove($album);
            $this->entityManager->flush($album);
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * @param int $id
     *
     * @return Album|object
     */
    public function getAlbumById(int $id): Album
    {
        return $this->albumRepository->find($id);
    }
}
