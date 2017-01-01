<?php
namespace Pacificnm\Page;

class Module
{
    /**
     * 
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/pacificnm.page.global.php';
    }
    
    /**
     * 
     * @return string[][][]
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/'
                ),
            ),
        );
    }
}

