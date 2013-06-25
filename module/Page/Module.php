<?php
namespace Page;

use Page\Model\Page;
use Page\Model\PageTable;
use Page\Model\TabNav;
use Page\Model\TabNavTable;
use Page\Model\PageContent;
use Page\Model\PageContentTable;
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
                'Page\Model\PageTable' =>  function($sm) {
                    $tableGateway = $sm->get('PageTableGateway');
                    $table = new PageTable($tableGateway);
                    return $table;
                },
                'PageTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Page());
                    return new TableGateway('page', $dbAdapter, null, $resultSetPrototype);
                },                

                'Page\Model\TabNavTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new TabNavTable($dbAdapter);
                    return $table;
                },
                'Page\Model\PageContentTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new PageContentTable($dbAdapter);
                    return $table;
                },
			)
        );
    }
	
	
}