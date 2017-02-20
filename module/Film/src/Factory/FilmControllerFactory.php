<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 11:55
 */
declare(strict_types = 1);


namespace Film\Factory;


use Film\Controller\FilmController;
use Film\Form\AddFilmForm;
use Film\Service\FilmService;
use Interop\Container\ContainerInterface;

class FilmControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {

        $filmService = $container->get(FilmService::class);
        $addFilmForm = $container->get('FormElementManager')->get(AddFilmForm::class);

        return new FilmController($filmService, $addFilmForm);
    }
}
