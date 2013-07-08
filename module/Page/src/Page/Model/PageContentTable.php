<?php

namespace Page\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;

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
	
	public function getPageCarousels($pageName)
	{
		
		$carouselArray = $this->select(array('name' => $pageName));
		
		//$carouselArray->order('order_id ASC');
		
							//	->columns(array('text' => 'text', 'label' => 'label', 'img' =>'img'))
								//->order('order_id ASC');
		return $carouselArray;
		
	}
	
}