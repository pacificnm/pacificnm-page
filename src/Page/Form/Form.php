<?php
namespace Page\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Page\Hydrator\Hydrator;
use Page\Entity\Entity;
use Menu\Service\ServiceInterface as MenuServiceInterface;
use MenuItem\Service\ServiceInterface as MenuItemServiceInterface;
use Controller\Service\ServiceInterface as ControllerServiceInterface;

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
     * @param MenuServiceInterface $menuService
     * @param MenuItemServiceInterface $menuItemService
     * @param ControllerServiceInterface $controllerService
     * @param string $name
     * @param array $options
     */
    public function __construct(MenuServiceInterface $menuService, MenuItemServiceInterface $menuItemService, ControllerServiceInterface $controllerService, $name = 'page-form', $options = array())
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
                'id' => 'pageName'
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
    

}

