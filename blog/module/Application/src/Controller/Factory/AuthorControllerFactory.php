<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\AuthorManager;
use Application\Controller\AuthorController;

/**
 * This is the factory for AuthorController. Its purpose is to instantiate the
 * controller.
 */
class AuthorControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $authorManager = $container->get(AuthorManager::class);
        
        // Instantiate the controller and inject dependencies
        return new AuthorController($entityManager, $authorManager);
    }
}


