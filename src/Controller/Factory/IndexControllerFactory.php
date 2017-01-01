<?php
namespace Pacificnm\Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Page\Controller\IndexController;

class IndexControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Page\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Page\Service\ServiceInterface');
        
        return new IndexController($service);
    }
}

