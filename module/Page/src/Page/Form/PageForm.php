<?php
namespace Page\Form;

use Zend\Form\Form;

class PageForm extends Form
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
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title : ',
            ),
        ));
        $this->add(array(
            'name' => 'text',
            'type' => 'Text',
            'options' => array(
                'label' => 'Text : ',
            ),
        ));
		$this->add(array(
            'name' => 'img',
            'type' => 'Text',
            'options' => array(
                'label' => 'Img : ',
            ),
        ));$this->add(array(
            'name' => 'carousel',
            'type' => 'Text',
            'options' => array(
                'label' => 'Carousel : ',
            ),
        ));
		$this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Name : ',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}