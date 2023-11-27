<?php

require_once 'vendor/autoload.php';

use models\Connection;
use models\GatosModel;

use PHPUnit\Framework\TestCase;

class GatosTest extends TestCase {
	public function testGetGatoById() {
		$gato = new GatosModel();
		$connection = new Connection();
		$connection = $connection->getConnection();

		$result = $gato->getGatoById($connection, "1");

		$this->assertSame("1", $result['id']);
	}
}

?>
