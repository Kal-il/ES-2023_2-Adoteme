<?php

require_once 'vendor/autoload.php';


use controller\GatosController;
use models\Connection;
use models\GatosModel;

use PHPUnit\Framework\TestCase;

class GatosModelTest extends TestCase {
	public function testGetGatoById() {
		$gato = new GatosModel();
		$connection = new Connection();
		$connection = $connection->getConnection();

		$result = $gato->getGatoById($connection, "1");

		$this->assertSame("1", $result['id']);
	}

	public function testGatoIsNotFound() {
		$controller = new GatosController();

		ob_start();
		$controller->visualizar_gato();
		$output = ob_get_clean();

		$this->assertStringContainsString("Gato não encontrado", $output);
	}
}

?>
