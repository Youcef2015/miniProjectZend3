<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 10:45
 */
declare(strict_types = 1);


namespace Film\Controller;


use Film\Form\AddFilmForm;
use Film\Service\FilmServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FilmController extends AbstractActionController
{
    /**
     * @var FilmServiceInterface $filmService
     */
    private $filmService;
    /**
     * @var AddFilmForm $filmForm
     */
    private $filmForm;

    public function __construct(FilmServiceInterface $filmService, AddFilmForm $filmForm)
    {
        $this->filmService  = $filmService;
        $this->filmForm  = $filmForm;
    }

    public function indexAction()
    {
        return new ViewModel(
            [
                'films' => $this->filmService->getAllFilms(),
            ]
        );
    }

    public function addAction()
    {
        /**
         * @var \Zend\Http\Request $request
         */
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->filmForm->setData($request->getPost());

            if ($this->filmForm->isValid()) {
                $film = $this->filmForm->getData();
                $this->filmService->create($film);

                return $this->redirect()->toRoute('film');
            }
        }

        return new ViewModel(
            [
                'form' => $this->filmForm
            ]
        );
    }

    public function editAction()
    {
        $filmId = (int) $this->params()->fromRoute('id', 0);
        $film = $this->filmService->getFilmById($filmId);

        if (!$film) {
            return $this->redirect()->toRoute('film', ['action' => 'add']);
        }

        /** @var Request $request */
        $request  = $this->getRequest();
        $this->filmForm->bind($film);

        if($request->isPost()) {
            $this->filmForm->setData($request->getPost());

            if($this->filmForm->isValid()) {
                $film = $this->filmForm->getData();

                $this->filmForm->edit($film);
                return $this->redirect()->toRoute('album');
            }
        }

        return  new ViewModel(
            [
                'form' => $this->filmForm,
                'id'   => $film->getId(),
            ]
        );
    }

    public function deleteAction()
    {

    }
}
