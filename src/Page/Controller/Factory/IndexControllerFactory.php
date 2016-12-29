<?php
namespace Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Controller\IndexController;

class IndexControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Page\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Page\Service\ServiceInterface');
        
        return new IndexController($service);
    }
}

