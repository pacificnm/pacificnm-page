<?php
namespace Page\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Page\Service\ServiceInterface;
use Page\Form\Form;

class UpdateController extends AbstractApplicationController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var Form
     */
    protected $form;

    /**
     *
     * @param ServiceInterface $service            
     * @param Form $form            
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->form = $form;
        
        $this->service = $service;
    }

    /**
     *
     * {@inheritdoc}
     *
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
        
        $this->form->bind($entity);
        
        return new ViewModel(array(
            'form' => $this->form,
            'entity' => $entity
        ));
    }
}

