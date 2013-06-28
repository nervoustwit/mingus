<?php

namespace Page\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class TabNavTable extends AbstractTableGateway
{
    protected $table = 'page';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new TabNav());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
}
