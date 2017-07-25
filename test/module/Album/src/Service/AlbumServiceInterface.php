<?php
/**
 * User: youcef_l
 * Date: 16/02/2017
 * Time: 14:27
 */
declare(strict_types = 1);


namespace Album\Service;


use Album\Model\Album;
use Doctrine\Common\Collections\Collection;

interface AlbumServiceInterface
{
    public function getAllAlbums();

    /**
     * @param int $id
     *
     * @return Album|null
     */
    public function getAlbumById(int $id): Album;
    public function create(Album $album): Album;
    public function edit(Album $album): Album;
    public function delete(Album $album): bool ;
}
