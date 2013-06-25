<?php


namespace Page\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Page\Model\Page;
use Page\Model\TabNav;
use Page\Form\PageForm;


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
    	return new ViewModel(array('pages' => $this->getPageTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
    	$form = new PageForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $page = new Page();
            $form->setInputFilter($page->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $page->exchangeArray($form->getData());
                $this->getPageTable()->savePage($page);

                // Redirect to list of albums
                return $this->redirect()->toRoute('page');
            }
        }
        return array('form' => $form);
		
    }

    public function editAction()
    {
    	
		$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('page', array(
                'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $page = $this->getPageTable()->getPage($id);
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
		//$resultSet = $this->getPageTable()->fetchAll();
		
		
		
	//	foreach($resultset){
		//$rowsetArray = $resultSet->buffer();
	//	$rowsetArray = $resultSet->next();
//		}
		
//		$tabNav = new TabNav();
//		$tabNav = $tabNav->testAllrows();
//		$page = array();
//		 foreach($resultSet as $row ){
//		 	$page['title']	= $row->title;
//			$page['text']	= $row->text;
//			$page['img']	= $row->img;
//			$page['name']	= $row->name; 
//		 }
	
	//$page = $this->getTabNav()->testAllRows();
		
		//return new ViewModel(array('page' => $resultSet ,
        	//));
        
//        $page = array();100,
 //                       ),
//                    ),
//                ),
//            )));

			     //       $inputFilter->add($factory->createInput(array(
               // 'name'     => 'text',
                //'required' => true,
                //'filte
//		$page[]= 'cool';
//		$page[]= 'awsome';
		
		//return new ViewModel(array('page' => $resultSet ,
        //));
        //return $page;
        
  $tabNav = $this->getTabNavTable()->fetchAll();
  

  $pageContent = $this->getPageContentTable()->fetchAll();
        
return new ViewModel(array('test' => $tabNav, 'contents' => $pageContent
        ));
        
	}

	
}
