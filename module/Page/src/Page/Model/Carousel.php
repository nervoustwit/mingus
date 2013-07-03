<?php

namespace Page\Model;

class Carousel
{
	
	protected $pageTable;
	protected $pageContentTable;
	
	public function getPageTable()
	{
		if (!$this->pageTable) {
            $sm = $this->getServiceLocator();
            $this->pageTable = $sm->get('Page\Model\PageTable');
        }
        return $this->pageTable;
	}
	
	public function getPageContentTable()
	{
		if (!$this->pageContentTable) {
            $sm = $this->getServiceLocator();
            $this->pageTable = $sm->get('Page\Model\PageContentTable');
        }
        return $this->pageContentTable;
	}
	
	public function getCarouselObject()
	{
		
		$pages = $this->getPageTable()->fetchAll();
		
		
		
		foreach ($pages->name as $pageName){
			
			$resultObject->name = $pageName;
			
			$contents = $this->getPageContentTable()->getPageCarousels($pageName);
			
			$resultObject->rowCount =  $contents->count();
			$resultObject->content = $contents;
			
			
			
		}
		
		return $resultObject;
		
	}
	
	
}
