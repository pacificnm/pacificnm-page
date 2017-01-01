<?php
namespace Pacificnm\Page\Controller\Plugin\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Page\Controller\Plugin\PageSetup;

class PageSetupFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Page\Controller\Plugin\PageSetup
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\Page\Service\ServiceInterface');
        
        $phpRenderer = $realServiceLocator->get('Zend\View\Renderer\PhpRenderer');
        
        return new PageSetup($service, $phpRenderer);
    }
}

