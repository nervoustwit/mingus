<?php

namespace Page\Model;



class TabNav 
{
    public $name;
    public $title;
	public $id;


    /**
* Used by ResultSet to pass each database row to the entity
*/
    public function exchangeArray($data)
    {
    	$this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
	
}