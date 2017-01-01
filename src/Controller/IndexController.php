<?php
namespace Pacificnm\Page\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\Page\Service\ServiceInterface;


class IndexController extends AbstractApplicationController
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
     * {@inheritdoc}
     *
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $this->getEventManager()->trigger('pageIndex', $this, array(
            'authId' => $this->identity()->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri()
        ));
        
        $filter = array(
            'page' => $this->page,
            'count-per-page' => $this->countPerPage,
            'pageRoute' => $this->params()->fromQuery('pageRoute', null),
        );
        
        $paginator = $this->service->getAll($filter);
        
        $paginator->setCurrentPageNumber($filter['page']);
        
        $paginator->setItemCountPerPage($filter['count-per-page']);
        
        return new ViewModel(array(
            'paginator' => $paginator,
            'page' => $filter['page'],
            'count-per-page' => $filter['count-per-page'],
            'itemCount' => $paginator->getTotalItemCount(),
            'pageCount' => $paginator->count(),
            'queryParams' => $this->params()->fromQuery(),
            'routeParams' => array()
        ));
    }
}


