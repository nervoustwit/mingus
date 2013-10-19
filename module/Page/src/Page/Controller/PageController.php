<?php


namespace Page\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Page\Model\Page;
use Page\Model\PageContent;
use Page\Model\TabNav;
use Page\Form\PageForm;
use Page\Form\EditTitleForm;
use Page\Form\EditTextForm;


class PageController extends AbstractActionController
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
			$pageContents['contents'][] = array('id' => $content->id, 'title' => $content->title, 'label' => $content->label, 'text' => $content->text, 'img' => $content->img);
			}
		

		$pagesContents[] = $pageContents;				
		}
		
		//$htmlizer = new Production();
		//$result = $htmlizer->printCarouselInsideTab($pagesContents);
		
				
		$currentPages = $this->getTabNavTable()->fetchAll();
					
    		//$production = new Production();
			//$result = $production->getPagesArray();
		 $editPages = $this->getPageTable()->fetchAll();
        
		$viewModel = new ViewModel(array('pages' => $pagesContents, 'tabs' => $currentPages, 'editPages' => $editPages));
		

        $viewModel->setTerminal(true);
        return $viewModel;
    }
		

    public function editAction()
    {
    	$id =3;
    	$page = $this->getPageContentTable()->getContent($id);
		
		$title = $page->title;
		
		$viewModel = new ViewModel(array('page' => $title));

        return $viewModel;
		/*$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('page', array(
                'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $page = $this->getPageTable()->getPage($id); Notice: Undefined property: stdClass::$id in /var/www/site.jj/module/Page/src/Page/Model/PageTable.php on line 40
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('page', array(
                'action' => 'index'
            ));
			
        }

        $form  = new PageForm();
        $form->bind($page);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($page->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getPageTable()->savePage($form->getData());

                // Redirect to list of albums
                return $this->redirect()->toRoute('page');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
		*/
		
		
		
    }

	public function editTitleAction()
    {

    	
		$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('page', array(
                'action' => 'index'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $page = $this->getPageContentTable()->getContent($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('page', array(
                'action' => 'index'
            ));
			
        }

        $form  = new EditTitleForm();
        $form->bind($page);
        //$form->get('submit');//->setAttribute('value', 'Edit');
		//$form->get('title');//->setAttribute('class', 'input-xlg form-control');
		
        $request = $this->getRequest();
        if ($request->isPost()) {
          //  $form->setInputFilter($page->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
               //print_r($form->getData());
					
                $this->getPageContentTable()->saveTitle($form->getData());

                // Redirect to list of albums
                
            }
        }


		$viewModel = new ViewModel(array('id' => $id, 'form' => $form));
    	$viewModel->setTerminal(true);
        return $viewModel;
    }

	public function editTextAction()
    {

    	
		$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('page', array(
                'action' => 'index'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $page = $this->getPageContentTable()->getContent($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('page', array(
                'action' => 'index'
            ));
			
        }

        $form  = new EditTextForm();
        $form->bind($page);
        //$form->get('submit');//->setAttribute('value', 'Edit');
		//$form->get('title');//->setAttribute('class', 'input-xlg form-control');
		
        $request = $this->getRequest();
        if ($request->isPost()) {
          //  $form->setInputFilter($page->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
               //print_r($form->getData());
					
                $this->getPageContentTable()->saveText($form->getData());

                // Redirect to list of albums
                //return $this->redirect()->toRoute('page');
            }
        }


		$viewModel = new ViewModel(array('id' => $id, 'form' => $form));
    	$viewModel->setTerminal(true);
        return $viewModel;
    }
    	
	public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('page');
        }
	

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getPageTable()->deletePage($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('page');
        }

        return array(
            'id'    => $id,
            'page' => $this->getPageTable()->getPage($id)
        );
		
    }
	
	public function stageExampleAction()
	{
		$request = $this->getRequest();
	
		 if ($request->isPost()) {
        // Make certain to merge the files info!
       $post = array_merge_recursive(
      $request->getPost()->toArray(),
      $request->getFiles()->toArray()
       );
  
  	//$post = 'merci!';
		  }
		$viewModel = new ViewModel(array('response' => $post));
    	$viewModel->setTerminal(true);
        return $viewModel;
		
	}
	
	public function carouselExampleAction()
	{
		
		
		//$carousels = array();
 

		//$carousels->name = "home";
		//$carousels->intCount = 3;
		//$carousels->contents = array();
		//$carousels->contents[] = array('label' => 'first', 'text' => 'welcome home', 'img' => 'page3.gif');
		//$carousels->contents[] = array('label' => 'second', 'text' => 'second welcome home', 'img' => 'page4.gif');
		//$carousels->contents[] = array('label' => 'third', 'text' => 'third welcome home', 'img' => 'page5.gif');
		//$carousels->contents[] = array('label' => 'four', 'text' => 'fourth welcome home', 'img' => 'page6.gif');
		
		//$pageName = 'home';	
		
		//$pageContent = $this->getPageContentTable()->getPageCarousels($pageName);	

			
			
		$pages = $this->getPageTable()->fetchAll();
		
		$names = array();
		
		foreach($pages as $page){
			$names[] = $page->name;
		}
		

		$result = array();
		
		foreach ($names as $pageName){
		$contents = $this->getPageContentTable()->getPageCarousels($pageName);
		
		$carousels['name'] = $pageName;
		$carousels['carouselCount'] = $contents->count();
		$carousels['contents'] = array();

			foreach($contents as $content){
			$carousels['contents'][] = array('title' => $content->title, 'label' => $content->label, 'text' => $content->text, 'img' => $content->img);
			}
		$result[] = $carousels;				
		}
		
		
		
		return new ViewModel(array('names' => $names, 'carousels' => $result
        ));
	}

	public function	editableAction()
	{
		$request = $this->getRequest();

        if ($request->isPost()) {
            $content->id = $request->getPost('pk');
			$content->name = $request->getPost('name');
			$content->value = $request->getPost('value');
			$this->getPageContentTable()->saveContent($content);
			
        }
		$viewModel = new ViewModel(array('response' => $content));
    	$viewModel->setTerminal(true);
        return $viewModel;
	}
	 
	public function uploadImgAction()
	{
		
		
		$viewModel = new ViewModel();
    	$viewModel->setTerminal(true);
        return $viewModel;
		
	}
	
	public function addAction()
    {

        $request = $this->getRequest();
        if ($request->isPost()) {
  
			$page->name = $request->getPost('name');
			$page->title = $request->getPost('title');
            $page->template = $request->getPost('template');
			$page->id = 0;

			//Add content row with the page name and retrieve the ID	
			$contentId = $this->getPageContentTable()->addContentRow($page->name);

			//save page and retrieve the ID			    
            $save = $this->getPageTable()->addPage($page);
						
            $response->id = $save;	//page ID
            $response->contentId = $contentId; //content ID
			
        }
        $viewModel = new ViewModel(array('response' => $response));
    	$viewModel->setTerminal(true);
        return $viewModel;
    }
	
	public function saveAction()
    {

        $request = $this->getRequest();
        if ($request->isPost()) {
  
			$page->name = $request->getPost('name');
			$page->value = $request->getPost('value');
			$page->id = $request->getPost('pk');

			//save page			    
            $this->getPageTable()->savePage($page);
						
            $response= $page;	//page object for debug
           
			
        }
        $viewModel = new ViewModel(array('response' => $response));
    	$viewModel->setTerminal(true);
        return $viewModel;
    }
	
}
