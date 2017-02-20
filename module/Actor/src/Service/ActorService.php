<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:17
 */
declare(strict_types = 1);


namespace Actor\Service;


use Actor\Entity\Actor;
use Actor\Repository\ActorRepository;
use Doctrine\ORM\EntityManager;

class ActorService implements ActorServiceInterface
{
    /**
     * @var EntityManager $entityManager
     */
    private $entityManager;

    /**
     * @var ActorRepository $actorRepository
     */
    private $actorRepository;

    public function __construct(EntityManager $entityManager, ActorRepository $actorRepository)
    {
        $this->entityManager   = $entityManager;
        $this->actorRepository = $actorRepository;
    }

    public function getActors()
    {
        return $this->actorRepository->findAll();
    }

    /**
     * @param int $id
     *
     * @return Actor|null
     */
    public function getBlogById(int $id): Actor
    {
        return $this->actorRepository->find($id);
    }

    public function create(Actor $actor): Actor
    {
        $this->entityManager->persist($actor);
        $this->entityManager->flush($actor);

        return $actor;
    }

    public function edit(Actor $actor): Actor
    {
        $this->entityManager->flush($actor);

        return $actor;
    }

    public function delete(Actor $actor): bool
    {
        try {
            $this->entityManager->remove($actor);
            $this->entityManager->flush($actor);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
