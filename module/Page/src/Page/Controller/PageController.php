<?php


namespace Page\Controller;

use Zend\Filter;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\InputFilter\FileInput;

use Zend\Filter\File\RenameUpload;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Page\Model\Page;
use Page\Model\PageContent;
use Page\Model\TabNav;
use Page\Model\PageMedia;
use Page\Form\PageForm;
use Page\Form\EditTitleForm;
use Page\Form\EditTextForm;
use Zend\Validator;


class PageController extends AbstractActionController
{
	protected $pageTable;
	protected $tabNavTable;
	protected $pageContentTable;
	protected $pageMediaTable;
	
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
	
	public function getPageMediaTable()
	{
		 if (!$this->pageMediaTable) {
            $sm = $this->getServiceLocator();
            $this->pageMediaTable = $sm->get('Page\Model\PageMediaTable');
    }
        return $this->pageMediaTable;
	}
	
	
    public function indexAction()
    {
		$pages = $this->getPageTable()->fetchAll();	
		$pagesData[] = array();

		foreach($pages as $page){
			
		$contents = $this->getPageContentTable()->getPageContents($page->name);

		$pageContents['id'] = $page->id;
		$pageContents['name'] = $page->name;
		$pageContents['template'] = $page->template;
		$pageContents['contentCount'] = $contents->count();
		$pageContents['contents'] = array();

			foreach($contents as $content){
				
			$mediaId = $content->media;
			
			$media = $this->getPageMediaTable()->getContentMedia($mediaId);
			if(!$media){
				$url = 'empty';
				$kind = 'empty';
			}elseif(!$media->url){
				$url = 'empty';
				$kind = 'empty';	
			}else{	
			$kind = $media->kind;
			$url = $media->url;	
			}	
			$pageContents['contents'][] = array(
											'id' => $content->id,
											'title' => $content->title,
											'label' => $content->label,
											'text' => $content->text,
											'media' => array('kind' => $kind, 'url' => $url)
											);
			
			}

		$pagesContents[] = $pageContents;				
		}
		
		//$htmlizer = new Production();
		//$result = $htmlizer->printCarouselInsideTab($pagesContents);
		
				
		$currentPages = $this->getTabNavTable()->fetchAll();
					
    		//$production = new Production();
			//$result = $production->getPagesArray();
		 $editPages = $this->getPageTable()->fetchAll();
        
		$data = $this->getPageMediaTable()->getContentMedia('4');
		
		//$mediaArray = $data->buffer();
		

		$viewModel = new ViewModel(array('pages' => $pagesContents, 'tabs' => $currentPages, 'editPages' => $editPages, 'debug' => $data));
		

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
    	
	public function deletePageAction()
    {
    	$request = $this->getRequest();
		
        
		

        
        if ($request->isPost()) {
        	$id = (int) $request->getPost('pk');
        if (!$id) {
            return $this->redirect()->toRoute('page');
        }
                        
               
                $this->getPageTable()->deletePage($id);

        }

	$result = 'success!!!!';

        $viewModel = new ViewModel(array('result' => $result));
    	$viewModel->setTerminal(true);
        return $viewModel;
		
    }
	
	public function deleteContentAction()
	{
		$request = $this->getRequest();
        if ($request->isPost()) {
        	$id = (int) $request->getPost('pk');
        if (!$id) {
            return $this->redirect()->toRoute('page');
        }
		  $this->getPageContentTable()->deleteContent($id);
        }

	$result = 'success!!!!';

        $viewModel = new ViewModel(array('result' => $result));
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
			$carousels['contents'][] = array('title' => $content->title, 'label' => $content->label, 'text' => $content->text, 'media' => $content->media);
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
	
	public function updateCarouselTitleAction()
	{
		
		$request = $this->getRequest();

        if ($request->isPost()) {
            $carouselTitle->page = $request->getPost('name');
			$carouselTitle->title = $request->getPost('title');
			$this->getPageContentTable()->updateCarouselTitle($carouselTitle);
			
        }
		$viewModel = new ViewModel(array('response' => $carouselTitle));
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
	
	public function addCarouselAction()
    {

        $request = $this->getRequest();
        if ($request->isPost()) {
  
			$carousel->name = $request->getPost('name');
			$carousel->label = $request->getPost('label');
            

			//Add content row with the page name and retrieve the ID
				
			$content->id = $this->getPageContentTable()->addCarouselRow($carousel);

			//save page and retrieve the ID			    
            //$save = $this->getPageTable()->addPage($page);
						
            //$response->id = $save;	//page ID
            //$response->contentId = $contentId; //content ID
			
        }
        $viewModel = new ViewModel(array('response' => $content));
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
	
	public function sortablePageAction()
	{
		$request = $this->getRequest();
		if ($request->isPost()) {
			$order = $request->getPost();
					
		$i = 0;
		foreach($order['page'] as $pk){
			
			$save->id = $pk;
			$save->position = $i;
			
			$this->getPageTable()->sortPage($save);
		
		$i++;			
		}	 
			
		}
		$viewModel = new ViewModel(array('response' => $order['page']));
    	$viewModel->setTerminal(true);
        return $viewModel;
	}
	
	public function embedMediaAction()
	{
		$request = $this->getRequest();

        if ($request->isPost()) {
            $media->pk = $request->getPost('pk');
			$media->url = $request->getPost('url');
			$media->kind = $request->getPost('kind');
			
			
			
			$content->id = $media->pk;
			$content->mediaId = $this->getPageMediaTable()->insertMedia($media);
	
			$this->getPageContentTable()->embedMedia($content);
        }
		
		$ye = "ye!!";
		$viewModel = new ViewModel(array('response' => $ye));
    	$viewModel->setTerminal(true);
        return $viewModel;
		
	}
	
	public function getMediaAction()
	{
		$request = $this->getRequest();

        if ($request->isPost()) {
            $media->pk = $request->getPost('pk');
		}
		
	}
	
	public function stageExampleAction()
	{
		$request = $this->getRequest();
	
		 if ($request->isPost()) {
        // Make certain to merge the files info!
        	if($request->getPost('pk')){
        $file = $request->getFiles();
        
        $post = array_merge_recursive(
      	$request->getPost()->toArray(),
      	$file->toArray());
  
  		$filter = new RenameUpload(array('target' => './public/img',
  								   'use_upload_extension'  => true,
   								   'randomize'  => true,));
  $data = $filter->filter($file['file']);
  
  $pk = $request->getPost('pk');
  
  $tmp_name = $data['tmp_name'];
    
  $data['pk'] = $pk;
  
  $data['img_url'] = str_replace('./public', 'http://site.jj', $tmp_name);
  
  $media->pk = $pk;
  $media->kind = 'img';
  $media->url = str_replace('./public', 'http://site.jj', $tmp_name);
  	
	$content->id = $pk;
	$content->mediaId = $this->getPageMediaTable()->insertMedia($media);
	
	$this->getPageContentTable()->embedMedia($content);
			}
		
		}
		$viewModel = new ViewModel(array('response' => $data));
    	$viewModel->setTerminal(true);
        return $viewModel;
		
	}
	
}
