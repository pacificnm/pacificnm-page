<?php
namespace Pacificnm\Page\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;
use Pacificnm\Page\Service\ServiceInterface;

class PageSetup extends AbstractPlugin
{

    /**
     * 
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var Zend\View\Renderer\PhpRenderer
     */
    protected $phpRenderer;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param PhpRenderer $phpRenderer
     */
    public function __construct(ServiceInterface $service, PhpRenderer $phpRenderer)
    {
        $this->service = $service;
        
        $this->phpRenderer = $phpRenderer;
    }

    /**
     *
     * @param string $pageName            
     * @param ViewModel $layout            
     */
    public function __invoke($pageName, ViewModel $layout)
    {
        $entity = $this->service->getPageByName($pageName);
        
        if($entity) {
            $layout->setVariable('pageSubTitle', $entity->getPageSubtitle());
            
            $layout->setVariable('pageTitle', $entity->getPageTitle());
            
            $layout->setVariable('activeMenuItem', $entity->getPageMenu());
            
            $layout->setVariable('activeSubMenuItem', $entity->getPageMenuSub());
            
            $layout->setVariable('pageIcon', $entity->getPageIcon());
            
            $this->phpRenderer->headTitle($entity->getPageTitle());
            
            
        } else {
            $layout->setVariable('pageSubTitle', 'Home');
            
            $layout->setVariable('pageTitle', $pageName);
            
            $layout->setVariable('activeMenuItem', 'index');
            
            $layout->setVariable('activeSubMenuItem', 'index');
            
            $layout->setVariable('pageIcon', 'fa fa-home');
            
            $this->phpRenderer->headTitle($pageName);
        }
    }
}
