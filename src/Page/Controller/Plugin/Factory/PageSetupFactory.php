<?php
namespace Page\Controller\Plugin\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Controller\Plugin\PageSetup;

class PageSetupFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Page\Controller\Plugin\PageSetup
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Page\Service\ServiceInterface');
        
        $phpRenderer = $realServiceLocator->get('Zend\View\Renderer\PhpRenderer');
        
        return new PageSetup($service, $phpRenderer);
    }
}

