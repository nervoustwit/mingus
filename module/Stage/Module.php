<?php
namespace Stage;

use Stage\Model\Stage;
use Stage\Model\StageTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Stage\Model\StageTable' =>  function($sm) {
                    $tableGateway = $sm->get('StageTableGateway');
                    $table = new StageTable($tableGateway);
                    return $table;
                },
                'StageTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Stage());
                    return new TableGateway('stage', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
	
	
}