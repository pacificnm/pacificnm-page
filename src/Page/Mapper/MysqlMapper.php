<?php
namespace Page\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Application\Mapper\AbstractMysqlMapper;
use Page\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Page\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll($filter)
    {
        $this->select = $this->readSql->select('page');
        
        $this->joinController()->joinModule();
        
        $this->filter($filter);
        
        $this->sort($filter);
        
        // if pagination is disabled
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Page\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('page');
        
        $this->joinController()->joinModule();
        
        $this->select->where(array(
            'page.page_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Page\Mapper\MysqlMapperInterface::getPageByName()
     */
    public function getPageByName($pageName)
    {
        $this->select = $this->readSql->select('page');
        
        $this->joinController()->joinModule();
        
        $this->select->where(array(
            'page.page_name = ?' => $pageName
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Page\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        // if we have id then its an update
        if ($entity->getPageId()) {
            $this->update = new Update('page');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'page.page_id = ?' => $entity->getPageId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('page');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setPageId($id);
        }
        
        return $this->get($entity->getPageId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Page\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('page');
        
        $this->delete->where(array(
            'page.page_id = ?' => $entity->getPageId()
        ));
        
        return $this->deleteRow();
    }

    /**
     *
     * @param array $filter            
     * @return \Page\Mapper\MysqlMapper
     */
    protected function filter($filter)
    {
        // controllerId
        if(array_key_exists('controllerId', $filter)) {
            $this->select->where(array(
                'page.controller_id = ?' => $filter['controllerId']
            ));
        }
        
        // moduleId
        if(array_key_exists('moduleId', $filter)) {
            $this->select->where(array(
                'page.module_id = ?' => $filter['moduleId']
            ));
        }
        
        // page route
        if(array_key_exists('pageRoute', $filter) && strlen($filter['pageRoute']) > 0) {
            $this->select->where(array(
                'page.page_route = ?' => $filter['pageRoute']
            ));
        }
        
        $this->sort($filter);
        
        return $this;
    }

    /**
     *
     * @param array $filter            
     * @return \Page\Mapper\MysqlMapper
     */
    protected function sort($filter)
    {
        $this->select->order('page.page_name');
        
        return $this;
    }

    /**
     *
     * @return \Page\Mapper\MysqlMapper
     */
    protected function joinController()
    {
        $this->select->join('controller', 'page.controller_id = controller.controller_id', array(
            'controller_name'
        ), 'left');
        
        return $this;
    }

    /**
     *
     * @return \Page\Mapper\MysqlMapper
     */
    protected function joinModule()
    {
        $this->select->join('module', 'page.module_id = module.module_id', array(
            'module_name',
            'module_version'
        ), 'left');
        
        return $this;
    }
}

