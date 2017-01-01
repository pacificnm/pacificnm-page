<?php
namespace Pacificnm\Page\Service;

use Pacificnm\Page\Entity\Entity;
use Pacificnm\Page\Mapper\MysqlMapperInterface;

class Service implements ServiceInterface
{

    protected $mapper;

    /**
     *
     * @param MysqlMapperInterface $mapper            
     */
    public function __construct(MysqlMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Page\Service\ServiceInterface::getAll()
     */
    public function getAll($filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Page\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Page\Service\ServiceInterface::getPageByName()
     */
    public function getPageByName($pageName)
    {
        return $this->mapper->getPageByName($pageName);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Page\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\Page\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }
}

