<?php
namespace Pacificnm\Page\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Page\Form\Form;

class FormFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\Page\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $menuService = $serviceLocator->get('Pacificnm\Menu\Service\ServiceInterface');
        
        $menuItemService = $serviceLocator->get('Pacificnm\MenuItem\Service\ServiceInterface');
        
        $controllerService = $serviceLocator->get('Pacificnm\Controller\Service\ServiceInterface');
        
        return new Form($menuService, $menuItemService, $controllerService);
    }
}

