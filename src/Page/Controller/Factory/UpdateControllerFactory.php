<?php
namespace Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Controller\UpdateController;

class UpdateControllerFactory
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
        
        $form = $realServiceLocator->get('Page\Form\Form');
        
        return new UpdateController($service, $form);
    }
}

