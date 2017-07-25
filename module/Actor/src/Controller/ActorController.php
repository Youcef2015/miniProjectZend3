<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 16:46
 */
declare(strict_types = 1);


namespace Actor\Controller;


use Actor\Form\AddActorForm;
use Actor\Service\ActorServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ActorController extends AbstractActionController
{
    /**
     * @var ActorServiceInterface $actorService
     */
    private $actorService;
    /**
     * @var AddActorForm $actorForm
     */
    private $actorForm;

    public function __construct(ActorServiceInterface $actorService, AddActorForm $actorForm)
    {
        $this->actorService = $actorService;
        $this->actorForm = $actorForm;
    }

    public function indexAction()
    {
        return new ViewModel(
            [
                'actors' => $this->actorService->getActors(),
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
            $this->actorForm->setData($request->getPost());

            if ($this->actorForm->isValid()) {

                $actor = $this->actorForm->getData();
                $this->actorService->create($actor);

                return $this->redirect()->toRoute('actor');
            }
        }

        return new ViewModel(
            [
                'form' => $this->actorForm
            ]
        );
    }
}
