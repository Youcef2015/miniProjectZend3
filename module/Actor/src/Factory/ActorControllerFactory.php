<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 17:47
 */
declare(strict_types = 1);


namespace Actor\Factory;


use Actor\Controller\ActorController;
use Actor\Form\AddActorForm;
use Actor\Service\ActorService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ActorControllerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $actorService = $container->get(ActorService::class);
        $actorForm = $container->get('FormElementManager')->get(AddActorForm::class);

        return new ActorController($actorService, $actorForm);
    }
}
