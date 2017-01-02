<?php
namespace Pacificnm\Page\Entity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $pageId;

    /**
     *
     * @var string
     */
    protected $pageName;

    /**
     *
     * @var string
     */
    protected $pageTitle;

    /**
     *
     * @var string
     */
    protected $pageSubtitle;

    /**
     *
     * @var string
     */
    protected $pageIcon;

    /**
     *
     * @var string
     */
    protected $pageMenu;

    /**
     *
     * @var string
     */
    protected $pageMenuSub;

    /**
     *
     * @var number
     */
    protected $layoutId;

    /**
     *
     * @var string
     */
    protected $pageRoute;

    /**
     *
     * @var string
     */
    protected $pageType;

    /**
     *
     * @var moduleId
     */
    protected $moduleId;

    /**
     *
     * @var controllerId
     */
    protected $controllerId;

    /**
     *
     * @var string
     */
    protected $pageAction;

    /**
     *
     * @var \Pacificnm\Controller\Entity\Entity
     */
    protected $controllerEntity;

    /**
     *
     * @var \Pacificnm\Module\Entity\Entity
     */
    protected $moduleEntity;

    /**
     *
     * @var \Pacificnm\Layout\Entity\Entity
     */
    protected $layoutEntity;

    /**
     *
     * @return the $pageId
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     *
     * @return the $pageName
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     *
     * @return the $pageTitle
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     *
     * @return the $pageSubtitle
     */
    public function getPageSubtitle()
    {
        return $this->pageSubtitle;
    }

    /**
     *
     * @return the $pageIcon
     */
    public function getPageIcon()
    {
        return $this->pageIcon;
    }

    /**
     *
     * @return the $pageMenu
     */
    public function getPageMenu()
    {
        return $this->pageMenu;
    }

    /**
     *
     * @return the $pageMenuSub
     */
    public function getPageMenuSub()
    {
        return $this->pageMenuSub;
    }

    /**
     *
     * @return the $layoutId
     */
    public function getLayoutId()
    {
        return $this->layoutId;
    }

    /**
     *
     * @return the $pageRoute
     */
    public function getPageRoute()
    {
        return $this->pageRoute;
    }

    /**
     *
     * @return the $pageType
     */
    public function getPageType()
    {
        return $this->pageType;
    }

    /**
     *
     * @return the $moduleId
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     *
     * @return the $controllerId
     */
    public function getControllerId()
    {
        return $this->controllerId;
    }

    /**
     *
     * @return the $pageAction
     */
    public function getPageAction()
    {
        return $this->pageAction;
    }

    /**
     *
     * @return the $controllerEntity
     */
    public function getControllerEntity()
    {
        return $this->controllerEntity;
    }

    /**
     *
     * @return the $moduleEntity
     */
    public function getModuleEntity()
    {
        return $this->moduleEntity;
    }

    /**
     *
     * @return the $layoutEntity
     */
    public function getLayoutEntity()
    {
        return $this->layoutEntity;
    }

    /**
     *
     * @param number $pageId            
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    /**
     *
     * @param string $pageName            
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;
    }

    /**
     *
     * @param string $pageTitle            
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     *
     * @param string $pageSubtitle            
     */
    public function setPageSubtitle($pageSubtitle)
    {
        $this->pageSubtitle = $pageSubtitle;
    }

    /**
     *
     * @param string $pageIcon            
     */
    public function setPageIcon($pageIcon)
    {
        $this->pageIcon = $pageIcon;
    }

    /**
     *
     * @param string $pageMenu            
     */
    public function setPageMenu($pageMenu)
    {
        $this->pageMenu = $pageMenu;
    }

    /**
     *
     * @param string $pageMenuSub            
     */
    public function setPageMenuSub($pageMenuSub)
    {
        $this->pageMenuSub = $pageMenuSub;
    }

    /**
     *
     * @param number $layoutId            
     */
    public function setLayoutId($layoutId)
    {
        $this->layoutId = $layoutId;
    }

    /**
     *
     * @param string $pageRoute            
     */
    public function setPageRoute($pageRoute)
    {
        $this->pageRoute = $pageRoute;
    }

    /**
     *
     * @param string $pageType            
     */
    public function setPageType($pageType)
    {
        $this->pageType = $pageType;
    }

    /**
     *
     * @param \Pacificnm\Page\Entity\moduleId $moduleId            
     */
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;
    }

    /**
     *
     * @param \Pacificnm\Page\Entity\controllerId $controllerId            
     */
    public function setControllerId($controllerId)
    {
        $this->controllerId = $controllerId;
    }

    /**
     *
     * @param string $pageAction            
     */
    public function setPageAction($pageAction)
    {
        $this->pageAction = $pageAction;
    }

    /**
     *
     * @param \Pacificnm\Controller\Entity\Entity $controllerEntity            
     */
    public function setControllerEntity($controllerEntity)
    {
        $this->controllerEntity = $controllerEntity;
    }

    /**
     *
     * @param \Pacificnm\Module\Entity\Entity $moduleEntity            
     */
    public function setModuleEntity($moduleEntity)
    {
        $this->moduleEntity = $moduleEntity;
    }

    /**
     *
     * @param \Pacificnm\Layout\Entity\Entity $layoutEntity            
     */
    public function setLayoutEntity($layoutEntity)
    {
        $this->layoutEntity = $layoutEntity;
    }
}

