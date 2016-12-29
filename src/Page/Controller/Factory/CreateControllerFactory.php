<?php
namespace Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Controller\CreateController;

class CreateControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Page\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Page\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Page\Form\Form');
        
        return new CreateController($service, $form);
    }
}

