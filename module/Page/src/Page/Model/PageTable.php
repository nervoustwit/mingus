<?php
namespace Page\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\Resultset;
use Zend\Db\Sql\Select;

class PageTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
       // $resultSet = $this->tableGateway->select();
        
        $resultSet = $this->tableGateway->select(function (Select $select) {$select->order('order_id ASC');});
		
        return $resultSet;
    }

    public function getPage($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function savePage($page)
    {
        $data = array($page->name => $page->value);

        $id = (int)$page->id;
		
            if ($this->getPage($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
        	}
    }
	
	    public function addPage($page)
    {
        $data = array(
            'title' 	=> $page->title,
            'name'  	=> $page->name,
            'template'	=> $page->template,
        );

        $id = (int)$page->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
			$id = $this->tableGateway->lastInsertValue;
			return $id;
        }
    }

    public function deletePage($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
	
	public function getPageTabs()
	{/*
	$resultSet = $this-fetchAll() ;
	
	$tabArray = array();
	
	foreach($resultSet as $page){
		$tabArray = $page->
		
	}
	*/
	}
	
	public function sortPage($sort)
	{

			$this->tableGateway->update(array('order_id' => $sort->position), array('id' => $sort->id));

	}

}