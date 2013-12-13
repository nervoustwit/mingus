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
	
	public function getTitle($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id)); 
        $row = $rowset->current()->title;
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
		
	public function saveContent($content)
    {
		$id = (int)$content->id;
		$data = array($content->name => $content->value);

        if ($id == 0) {
            $this->insert($data);
			$id = $this->lastInsertValue;
			return $id;
        } else {
            if ($this->getContent($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

	public function deleteContent($id)
	{
		$this->delete(array('id' => $id));
	}
	
	public function updateCarouselTitle($carouselTitle)
	{
		$this->update(array('title' => $carouselTitle->title), array('name' => $carouselTitle->page));
	}

	public function saveTitle($page)
	{
		$data = array(
            'title' 	=> $page->title
        );
		$id = (int)$page->id;
		if ($this->getContent($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
	}
	
	public function saveText($page)
	{
		$data = array('text' => $page->text);
		$id = (int)$page->id;
		if ($this->getContent($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
		
	}
	
	public function updateContent($content)
	{
		$id = (int)$content->id;
		$data = array($content->name => $content->value);
		if ($this->getContent($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
	}
	
	public function addCarouselRow($entity)
	{
		if(!empty($entity->label)){
			$label = $entity->label;
		}else{
			$label = "Blank Label";
		}
		
         $this->insert(array('name' => $entity->name, 'label' => $label, 'order_id' => 100));
		 $id = $this->lastInsertValue;
		return $id;
		
	}
	public function addContentRow($name)
	{
		$this->insert(array('name' => $name, 'order_id' => 100));
		 $id = $this->lastInsertValue;
		return $id;
	}
	public function embedMedia($content)
	{
		
		
		
	}
}