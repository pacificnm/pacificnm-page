<?php
namespace Page\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\View\Helper\PageSearchForm;

class PageSearchFormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Page\View\Helper\PageSearchForm
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        return new PageSearchForm();
    }
}

