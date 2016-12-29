<?php
namespace Page\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Page\Mapper\MysqlMapper;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Page\Hydrator\Hydrator;
use Page\Entity\Entity;

class MysqlMapperFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Page\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
        
        $hydrator->add(new Hydrator());
        
        $prototype = new Entity();
        
        $readAdapter = $serviceLocator->get('db2');
        
        $writeAdapter = $serviceLocator->get('db1');
        
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }
}

