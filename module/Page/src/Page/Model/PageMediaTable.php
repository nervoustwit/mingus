<?php

namespace Page\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class PageMediaTable extends AbstractTableGateway
{
    protected $table = 'media';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new PageMedia());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
	public function embedMedia($media)
	{
	 
	 $content_id = $media->pk;
	 $kind = 	   $media->kind;
	 $url =		   $media->url;
	 
	 
	}
	
	public function getContentMedia($contentId)
	{
		$rowset = $this->select(array('id' => $contentId));
		
		$data = $rowset->current();
		
		return $data;
		
	}
}