<?php

use controller\GatosController;

use PHPUnit\Framework\TestCase;

class GatosControllerTest extends TestCase {
	public function testGatoIsNotFound() {
		$controller = new GatosController();

		ob_start();
		$controller->visualizar_gato();
		$output = ob_get_clean();

		$this->assertStringContainsString("Gato não encontrado", $output);
	}
}

?>
