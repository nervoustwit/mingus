<?php

namespace Page\Hydrator;

use ReflectionMethod;
use Traversable;
use Zend\Stdlib\Exception;
use Zend\Stdlib\Hydrator\AbstractHydrator;
use Zend\Stdlib\Hydrator\HydratorOptionsInterface;

Abstract class TableEntityMapper    extends AbstractHydrator    implements HydratorOptionsInterface
{
    protected $_dataMap = true;
    public function __construct($map)
    {
        parent::__construct();
        $this->_dataMap = $map;
    }
    public function extract($object)
	{}
	
	public function hydrate(array $data, $object)
    {
        if (!is_object($object)) {
            throw new Exception\BadMethodCallException(sprintf(
                '%s expects the provided $object to be a PHP object)',
                __METHOD__
            ));
        }
        foreach ($data as $property => $value) {
            if (!property_exists($this, $property)) {
                if (in_array($property, array_keys($this->_dataMap))) {
                    $_prop = $this->_dataMap[$property];
                    $object->$_prop = $value;
                } else {
                    // unknown properties are skipped
                }
            } else {
                $object->$property = $value;
            }
        }
        return $object;
    }
	
}