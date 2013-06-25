<?php

namespace Page\Model;



class PageContent 
{
    public $name;
    public $text;
	public $img;


    /**
* Used by ResultSet to pass each database row to the entity
*/
    public function exchangeArray($data)
    {
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->text = (isset($data['text'])) ? $data['text'] : null;
		$this->img = (isset($data['img'])) ? $data['img'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
	
}