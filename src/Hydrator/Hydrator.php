<?php
namespace Pacificnm\Page\Hydrator;

use Zend\Hydrator\ClassMethods;
use Pacificnm\Page\Entity\Entity;

class Hydrator extends ClassMethods
{

    /**
     *
     * @param string $underscoreSeparatedKeys            
     */
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::hydrate()
     */
    public function hydrate(array $data, $object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
        
        parent::hydrate($data, $object);
        
        $controllerEntity = parent::hydrate($data, new \Pacificnm\Controller\Entity\Entity());
        
        $moduleEntity = parent::hydrate($data, new \Pacificnm\Module\Entity\Entity());
        
        $layoutEntity = parent::hydrate($data, new \Pacificnm\Layout\Entity\Entity());
        
        $object->setControllerEntity($controllerEntity);
        
        $object->setModuleEntity($moduleEntity);
        
        $object->setLayoutEntity($layoutEntity);
        
        return $object;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::extract()
     */
    public function extract($object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
        
        $data = parent::extract($object);
        
        unset($data['controller_entity']);
        
        unset($data['module_entity']);
        
        unset($data['layout_entity']);
        
        return $data;
    }
}

