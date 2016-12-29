<?php
namespace Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Controller\ViewController;

class ViewControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Page\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Page\Service\ServiceInterface');
        
        return new ViewController($service);
    }
}

