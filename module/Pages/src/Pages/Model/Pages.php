<?php
namespace Pages\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class Pages implements InputFilterAwareInterface
{
    public $page_id;
    public $page_title;
    public $page_text;
	public $page_img;
	public $page_carousel;
	public $page_name;
	
	protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->page_id			= (!empty($data['page_id'])) ? $data['page_id'] : null;
        $this->page_title		= (!empty($data['page_title'])) ? $data['page_title'] : null;
        $this->page_text		= (!empty($data['page_text'])) ? $data['page_text'] : null;
		$this->page_img     	= (!empty($data['page_img'])) ? $data['page_img'] : null;
		$this->page_carousel	= (!empty($data['page_carousel'])) ? $data['page_id'] : null;
		$this->page_name		= (!empty($data['page_name'])) ? $data['page_name'] : null;
    }
	
	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
	
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'artist',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'title',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
	
	
}
