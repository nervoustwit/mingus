<?php

namespace Page\Model;

use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;

class TabNav
{

	public function testAllRows()
	{
		$stmt = $driver->createStatement('SELECT * FROM page');
		$stmt->prepare();
		$result = $stmt->execute($parameters);
		
		if ($result instanceof ResultInterface && $result->isQueryResult()) {
		    $resultSet = new ResultSet;
		    $resultSet->initialize($result);
		
		    foreach ($resultSet as $row) {
		        echo $row->my_column . PHP_EOL;
		    }
		}
	}

}