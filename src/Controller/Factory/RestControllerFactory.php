<?php
namespace Pacificnm\Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Page\Controller\RestController;

class RestControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Page\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
    
        $service = $realServiceLocator->get('Pacificnm\Page\Service\ServiceInterface');
        
        return new RestController();
    }
}

