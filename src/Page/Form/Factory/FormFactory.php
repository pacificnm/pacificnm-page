<?php
namespace Page\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Form\Form;

class FormFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Page\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $menuService = $serviceLocator->get('Menu\Service\ServiceInterface');
        
        $menuItemService = $serviceLocator->get('MenuItem\Service\ServiceInterface');
        
        $controllerService = $serviceLocator->get('Controller\Service\ServiceInterface');
        
        return new Form($menuService, $menuItemService, $controllerService);
    }
}

