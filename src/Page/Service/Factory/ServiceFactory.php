<?php
namespace Page\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Service\Service;

class ServiceFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Page\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Page\Mapper\MysqlMapperInterface');
        
        return new Service($mapper);
    }
}

