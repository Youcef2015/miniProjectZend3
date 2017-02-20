<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:18
 */

namespace Actor\Service;


use Actor\Entity\Actor;

interface ActorServiceInterface
{
    public function getActors();

    /**
     * @param int $id
     *
     * @return Actor|null
     */
    public function getBlogById(int $id): Actor;
    public function create(Actor $actor): Actor;
    public function edit(Actor $actor): Actor;
    public function delete(Actor $actor): bool;
}
