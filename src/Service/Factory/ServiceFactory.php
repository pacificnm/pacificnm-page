<?php
namespace Pacificnm\Page\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Page\Service\Service;

class ServiceFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Page\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\Page\Mapper\MysqlMapperInterface');
        
        return new Service($mapper);
    }
}

