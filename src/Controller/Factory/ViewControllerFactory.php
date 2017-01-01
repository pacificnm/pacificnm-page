<?php
namespace Pacificnm\Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Page\Controller\ViewController;

class ViewControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Page\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Page\Service\ServiceInterface');
        
        return new ViewController($service);
    }
}

