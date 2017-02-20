<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 12:13
 */

namespace Film\Service;


use Film\Entity\Film;

interface FilmServiceInterface
{
    public function getAllFilms();

    /**
     * @param int $id
     *
     * @return Album|null
     */
    public function getFilmById(int $id);
    public function create(Film $film);
    public function edit(Film $film);
    public function delete(Film $film);
}
