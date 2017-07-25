<?php
/**
 * User: orkin
 * Date: 13/02/2017
 * Time: 17:00
 */
declare(strict_types = 1);


namespace Album\Controller;


use Album\Form\AddAlbumForm;
use Album\Service\AlbumService;
use Album\Service\AlbumServiceInterface;
use Album\Form\AlbumForm;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{

    /**
     * @var AlbumServiceInterface
     */
    private $albumService;

    private $albumForm;

    // Add this constructor:
    public function __construct(AlbumServiceInterface $albumService, AddAlbumForm $albumForm)
    {
        $this->albumService = $albumService;
        $this->albumForm = $albumForm;
    }

    public function indexAction()
    {
        return new ViewModel(
            [
                'albums' => $this->albumService->getAllAlbums()
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
            $this->albumForm->setData($request->getPost());

            if ($this->albumForm->isValid()) {
                $album = $this->albumForm->getData();
                $this->albumService->create($album);

                return $this->redirect()->toRoute('album');
            }
        }

        return new ViewModel(
            [
                'form' => $this->albumForm
            ]
        );
    }

    public function editAction()
    {
        $albumId = (int) $this->params()->fromRoute('id', 0);
        $album = $this->albumService->getAlbumById($albumId);

        if (!$album) {
            return $this->redirect()->toRoute('album', ['action' => 'add']);
        }

        /** @var Request $request */
        $request  = $this->getRequest();
        $this->albumForm->bind($album);

        if($request->isPost()) {
            $this->albumForm->setData($request->getPost());

            if($this->albumForm->isValid()) {
                $album = $this->albumForm->getData();
                $this->albumService->edit($album);
                return $this->redirect()->toRoute('album');
            }
        }

        return  new ViewModel(
        [
            'form' => $this->albumForm,
            'id'   => $album->getId(),
        ]
    );
    }

    public function deleteAction()
    {
        $albumId = (int)$this->params()->fromRoute('id', 0);
        $album = $this->albumService->getAlbumById($albumId);
        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int)$request->getPost('id');
                $album = $this->albumService->getAlbumById($id);
                $this->albumService->delete($album);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('album');
        }

        return [
            'id'    => $albumId,
            'album' => $album,
        ];
    }
}
