<?php
namespace Page\Controller;

use Application\Controller\AbstractApplicationController;
use Page\Service\ServiceInterface;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractApplicationController
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if(! $entity) {
            $this->flashMessenger()->addErrorMessage('Page was not found');
            
            return $this->redirect()->toRoute('page-index');
        }
        
        $this->getEventManager()->trigger('pageView', $this, array(
            'authId' => $this->identity()->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri(),
            'pageEntity' => $entity
        ));
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

