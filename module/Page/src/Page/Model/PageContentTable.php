<?php

namespace Page\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
//use Zend\Db\Sql\Where;
//use Zend\Db\Sql\Sql;
//use Zend\Db\Sql\Expression;

class PageContentTable extends AbstractTableGateway
{
    protected $table = 'content';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new PageContent());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
	
	public function getPageContents($pageName)
	{
		
		$carouselArray = $this->select(array('name' => $pageName));
		
		//$carouselArray->order('order_id ASC');
		
							//	->columns(array('text' => 'text', 'label' => 'label', 'img' =>'img'))
								//->order('order_id ASC');
		return $carouselArray;
		
	}
	
	public function getContent($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id)); 
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
	
	public function saveContent(Page $page)
    {
        $data = array(
            'title' 	=> $page->title,
            'label'		=> $page->label,
            'text'  	=> $page->text,
            'img'	  	=> $page->img,
            'carousel'	=> $page->carousel,
            'name'  	=> $page->name,
        );

        $id = (int)$page->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getContent($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

	public function saveTitle($id, $title)
	{
		if ($this->getContent($id)) {
                $this->tableGateway->update(array('title' => $title), array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
	}
}