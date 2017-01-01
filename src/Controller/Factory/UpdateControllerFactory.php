<?php
namespace Pacificnm\Page\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Page\Controller\UpdateController;

class UpdateControllerFactory
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
        
        $form = $realServiceLocator->get('Pacificnm\Page\Form\Form');
        
        return new UpdateController($service, $form);
    }
}

