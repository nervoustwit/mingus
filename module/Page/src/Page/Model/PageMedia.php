<?php
namespace Page\Model;

 class PageMedia
 {
     public $id;
     public $content_id;
     public $kind;
	 public $url;

     public function exchangeArray($data)
     {
         $this->id     = 		(!empty($data['id'])) ? $data['id'] : null;
         $this->content_id = 	(!empty($data['content_id'])) ? $data['content_id'] : null;
         $this->kind  = 		(!empty($data['kind'])) ? $data['kind'] : null;
		 $this->url  = 			(!empty($data['url'])) ? $data['url'] : null;
     }
 }