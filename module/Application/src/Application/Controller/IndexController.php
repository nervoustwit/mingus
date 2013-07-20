<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Page\Model\Page;

use Page\Model\TabNav;
use Page\Form\PageForm;
use Application\Model\Production;

class IndexController extends AbstractActionController
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
	
    public function indexAction()
    	{
    	$pages = $this->getPageTable()->fetchAll();	
		$pagesNames = array();

		foreach($pages as $page){
			$pageNames[] = $page->name;
		}

		foreach ($pageNames as $pageName){
		$contents = $this->getPageContentTable()->getPageContents($pageName);

		$pageContents['name'] = $pageName;
		$pageContents['contentCount'] = $contents->count();
		$pageContents['contents'] = array();

			foreach($contents as $content){
			$pageContents['contents'][] = array('title' => $content->title, 'label' => $content->label, 'text' => $content->text, 'img' => $content->img);
			}
		

		$pagesContents[] = $pageContents;				
		}
		
		//$htmlizer = new Production();
		//$result = $htmlizer->printCarouselInsideTab($pagesContents);
		
				
		$tabNav = $this->getTabNavTable()->fetchAll();
					
    		//$production = new Production();
			//$result = $production->getPagesArray();
		 
        
			return new ViewModel(array('pages' => $pagesContents, 'tabs' => $tabNav));
    	}
		
		
}
