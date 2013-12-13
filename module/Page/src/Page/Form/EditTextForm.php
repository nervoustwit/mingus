<?php
namespace Page\Form;

use Zend\Form\Form;

class EditTextForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('page');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'text',
            'type' => 'Textarea',
            'attributes' => array(
            'class'	=>	'form-control',
		   ),          
        ));
		$this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Save',
                'class'	=> 'btn btn-default btn-lg glyphicon glyphicon-floppy-disk',
                'id' => 'submitbutton',
            ),
        ));
        
    }
}