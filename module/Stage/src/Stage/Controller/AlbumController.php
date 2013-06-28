<?php


namespace Stage\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Stage\Model\Stage;
use Stage\Form\StageForm;


class StageController extends AbstractActionController
{
	protected $stageTable;
	
    public function indexAction()
    {
    	return new ViewModel(array('stages' => $this->getStageTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
    	$form = new StageForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $stage = new Stage();
            $form->setInputFilter($stage->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $stage->exchangeArray($form->getData());
                $this->getStageTable()->saveStage($stage);

                // Redirect to list of stages
                return $this->redirect()->toRoute('stage');
            }
        }
        return array('form' => $form);
		
    }

    public function editAction()
    {
    	
		$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('stage', array(
                'action' => 'add'
            ));
        }

        // Get the Stage with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $stage = $this->getStageTable()->getStage($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('stage', array(
                'action' => 'index'
            ));
        }

        $form  = new StageForm();
        $form->bind($stage);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($stage->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getStageTable()->saveStage($form->getData());

                // Redirect to list of stages
                return $this->redirect()->toRoute('stage');
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
            return $this->redirect()->toRoute('stage');
        }
	

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getStageTable()->deleteStage($id);
            }

            // Redirect to list of stages
            return $this->redirect()->toRoute('stage');
        }

        return array(
            'id'    => $id,
            'stage' => $this->getStageTable()->getStage($id)
        );
		
    }

	public function getStageTable()
    {
        if (!$this->stageTable) {
            $sm = $this->getServiceLocator();
            $this->stageTable = $sm->get('Stage\Model\StageTable');
        }
        return $this->stageTable;
    }
	
}
