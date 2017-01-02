<?php
namespace Pacificnm\Page\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\Page\Hydrator\Hydrator;
use Pacificnm\Page\Entity\Entity;
use Pacificnm\Menu\Service\ServiceInterface as MenuServiceInterface;
use Pacificnm\MenuItem\Service\ServiceInterface as MenuItemServiceInterface;
use Pacificnm\Controller\Service\ServiceInterface as ControllerServiceInterface;
use Pacificnm\Layout\Service\ServiceInterface as LayoutServiceInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{
    /**
     * 
     * @var MenuServiceInterface
     */
    protected $menuService;
    
    /**
     * 
     * @var MenuItemServiceInterface
     */
    protected $menuItemService;
    
    /**
     * 
     * @var ControllerServiceInterface
     */
    protected $controllerService;
    
    /**
     * 
     * @var LayoutServiceInterface
     */
    protected $layoutService;
    
    /**
     * 
     * @param MenuServiceInterface $menuService
     * @param MenuItemServiceInterface $menuItemService
     * @param ControllerServiceInterface $controllerService
     * @param LayoutServiceInterface $layoutService
     * @param string $name
     * @param array $options
     */
    public function __construct(MenuServiceInterface $menuService, MenuItemServiceInterface $menuItemService, ControllerServiceInterface $controllerService, LayoutServiceInterface $layoutService,$name = 'page-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        $this->menuService = $menuService;
        
        $this->menuItemService = $menuItemService;
        
        $this->controllerService = $controllerService;
        
        // pageId
        $this->add(array(
            'name' => 'pageId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'pageId'
            )
        ));
        
        // pageName
        $this->add(array(
            'name' => 'pageName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Page Name:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageName'
            )
        ));
        
        // pageTitle
        $this->add(array(
            'name' => 'pageTitle',
            'type' => 'Text',
            'options' => array(
                'label' => 'Page Title:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageTitle'
            )
        ));
        
        
        // pageSubtitle
        $this->add(array(
            'name' => 'pageSubtitle',
            'type' => 'Text',
            'options' => array(
                'label' => 'Page Sub Title:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageSubtitle'
            )
        ));
        
        // pageIcon
        $this->add(array(
            'name' => 'pageIcon',
            'type' => 'Text',
            'options' => array(
                'label' => 'Page Icon:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageIcon'
            )
        ));
        
        // pageMenu
        $this->add(array(
            'type' => 'Select',
            'name' => 'pageMenu',
            'options' => array(
                'label' => 'Active Menu:',
                'value_options' => $this->getMenuOptions()
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageMenu'
            )
        ));
        
        // pageMenuSub
        $this->add(array(
            'type' => 'Select',
            'name' => 'pageMenuSub',
            'options' => array(
                'label' => 'Active Sub Menu:',
                'value_options' => $this->getMenuSubOptions()
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageMenuSub'
            )
        ));
        
        // layoutId
        $this->add(array(
            'type' => 'Select',
            'name' => 'layoutId',
            'options' => array(
                'label' => 'Layout:',
                'value_options' => $this->getMenuSubOptions()
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'layoutId'
            )
        ));
        
        // pageType
        $this->add(array(
            'type' => 'Select',
            'name' => 'pageType',
            'options' => array(
                'label' => 'Route Type:',
                'value_options' => array(
                    
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageType'
            )
        ));
        
        // pageRoute
        $this->add(array(
            'name' => 'pageRoute',
            'type' => 'Text',
            'options' => array(
                'label' => 'Route:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageRoute'
            )
        ));
        
        // pageController
        $this->add(array(
            'type' => 'Select',
            'name' => 'pageController',
            'options' => array(
                'label' => 'Controller:',
                'value_options' => array(
        
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageController'
            )
        ));
        
        // pageAction
        $this->add(array(
            'type' => 'Select',
            'name' => 'pageAction',
            'options' => array(
                'label' => 'Action:',
                'value_options' => array(
        
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pageAction'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }
    
    /**
     * {@inheritDoc}
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array(
            // pageId
            
            // pageName
            
            // pageTitle
            
            // pageSubtitle
            
            // pageIcon
            
            // pageMenu
            
            // pageMenuSub
            
            // pageType
            
            // pageRoute
            
            // pageController
            
            // pageAction
        );
        
    }
    
    /**
     * @return array
     */
    protected function getMenuOptions()
    {
        $options = array();
        
        $entitys = $this->menuService->getAll(array(
            'pagination' => 'off'
        ));
        
        foreach($entitys as $entity) {
            $options[$entity->getMenuRoute()] = $entity->getMenuName();
        }
        
        return $options;
    }
    
    /**
     * @return array
     */
    protected function getMenuSubOptions()
    {
        
        $options = array();
        
        return $options;
    }
    
    /**
     * 
     * @return NULL[]
     */
    protected function getLayoutOptions()
    {
        $options = array();
        
        $entitys = $this->layoutService->getAll(array(
            'pagination' => 'off'
        ));
        
        foreach($entitys as $entity) {
            $options[$entity->getLayoutId()] = $entity->getLayoutName();
        }
        
        return $options;
    }
}

