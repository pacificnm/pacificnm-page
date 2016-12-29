<?php
namespace Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Controller\DeleteController;

class DeleteControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Page\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
    
        $service = $realServiceLocator->get('Page\Service\ServiceInterface');
        
        return new DeleteController($service);
    }
}

