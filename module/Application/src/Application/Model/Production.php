<?php

namespace Application\Model;


use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Production
{
	
	protected $pageTable;
	protected $tabNavTable;
	protected $pageContentTable;
	
	public function getPageTable()
    {
        if (!$this->pageTable) {
            $sm = $this->getServiceLocator();
            $this->pageTable = $sm->get('Page\Model\PageTable');
        }
        return $this->pageTable;
    }
	
	public function getTabNavTable()
    {
        if (!$this->tabNavTable) {
            $sm = $this->getServiceLocator();
            $this->tabNavTable = $sm->get('Page\Model\TabNavTable');
        }
        return $this->tabNavTable;
    }
	public function getPageContentTable()
    {
        if (!$this->pageContentTable) {
            $sm = $this->getServiceLocator();
            $this->pageContentTable = $sm->get('Page\Model\PageContentTable');
    }
        return $this->pageContentTable;
    }

	public function getPagesArray()
    	{
					
		$pages = $this->getPageTable()->fetchAll();
		
		$pagesNames = array();
		
		foreach($pages as $page){
			$pagesNames[] = $page->name;
		}
		

		$pagesContents = array();
		
		foreach ($names as $pageName){
		$contents = $this->getPageContentTable()->getPageContents($pageName);
		
		$pageContents['name'] = $pageName;
		$pageContents['contentCount'] = $contents->count();
		$pageContents['contents'] = array();

			foreach($contents as $content){
			$carousels['contents'][] = array('title' => $content->title, 'label' => $content->label, 'text' => $content->text, 'img' => $content->img);
			}
		$pagesContents[] = $pageContent;				
		}
				
		return $result;
	}
		
	public function printCarouselInsideTab($pages)
	{
		//echo '<div class="tab-content">
		//';
		
		foreach($pages as $page)
		{
		echo '<div class="tab-pane" id="'.$page['name'].'Tab">
		';
		if($page['contentCount'] == 1)
		{	
		echo
		'<div class="singleContent" id="'.$page['name'].'Content">
			<h1>'.$page['contents'][0]['title'].'</h1>
			<p>'.$page['contents'][0]['text'].'</p>
			<div class="thumbnail">
			<img src="img/'.$page['contents'][0]['img'].'">
			</div>
         </div>
         ';
		}
		elseif($page['contentCount'] >= 2)
		{
		echo
		'<div class="carousel slide" id="'.$page['name'].'Carousel">
           <ol class="carousel-indicators">';
		   
		   $carouselCount = 0;
		   while($carouselCount <= $page['contentCount'])
		   {
		   		if($carouselCount == 0)
				{
					echo '<li data-target="#'.$page['name'].'Carousel" data-slide-to="'.$carouselCount.'"></li>'.PHP_EOL ;
						}else{
					echo '<li data-target="#'.$page['name'].'Carousel" data-slide-to="'.$carouselCount.'"></li>'.PHP_EOL ;					
						}
					$carouselCount++;
				}
		   echo '</ol>
                <div class="carousel-inner">
                ';
				$contentCount = 0;
				foreach($page['contents'] as $content)
				{
					if($contentCount == 0)
					 {
						echo '<div class="item active">
 	 		     	          	<img src="http://site.jj/img/'.$content['img'].'" alt="">
             		 		    <div class="carousel-caption">
                    			  <h4>'.$content['label'].'</h4>
                   				   <p>'.$content['text'].'</p>
                   				</div>
                 			 </div>
                 			 
                 			 ';
					 }
					 elseif($contentCount >= 1)
					 {
						echo '<div class="item">
 	 		     	          	<img src="http://site.jj/img/'.$content['img'].'" alt="">
             		 		    <div class="carousel-caption">
                    			  <h4>'.$content['label'].'</h4>
                   				   <p>'.$content['text'].'</p>
                   				</div>
                 			 </div>
                 			 
                 			 ';
				  	 }		 	
					$contentCount++;
				}
				
				echo 
				'</div>
                <a class="left carousel-control" href="#'.$page['name'].'Carousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#'.$page['name'].'Carousel" data-slide="next">&rsaquo;</a>
				</div>
				';
					
		   }

		 echo '</div>';
		

		 } 
		
	//echo'</div>';

	}

}		
