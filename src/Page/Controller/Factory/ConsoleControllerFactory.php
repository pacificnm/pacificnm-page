<?php
namespace Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;

class ConsoleControllerFactory
{
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
    
        $service = $realServiceLocator->get('Page\Service\ServiceInterface');
    }
}

