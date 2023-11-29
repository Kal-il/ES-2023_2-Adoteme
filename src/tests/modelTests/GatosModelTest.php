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

	// Teste para a função CreateGato
    public function testCreateGato() {
        $connection = pg_connect("host=silly.db.elephantsql.com dbname=ymobdwtv user=ymobdwtv password=6z7xnZXsb2DWh6_NWJdqvl8ObXlJMoWu");
        $gatosModel = new GatosModel();
        $data = [
            'nome' => 'Gato Teste',
            'dataNascimento' => '2022-01-01',
            'sexo' => 'Macho',
            'cor' => 'Preto',
            'descricao' => 'Um gato de teste',
            'castrado' => true,
            'vacinacaoCompleta' => true,
            'infoVacina' => 'Vacina ABC',
            'personalidades' => ['Brincalhão', 'Curioso'],
            'foto1_url' => 'url_da_foto1.jpg',
            'foto2_url' => 'url_da_foto2.jpg',
            'foto3_url' => 'url_da_foto3.jpg',
        ];
        $result = $gatosModel->CreateGato($connection, $data);
        $this->assertTrue($result, 'Gato não foi inserido no banco de dados');
        $idDoGatoInserido = $this->getIdDoGatoInserido($connection, $data['nome']);
        $gatosModel->DeleteGato($connection, $idDoGatoInserido);
        pg_close($connection);
    }

    private function getIdDoGatoInserido($connection, $nomeDoGato) {
        $query = "SELECT id FROM gatos WHERE nome = '$nomeDoGato'";
        $resultado = pg_query($connection, $query);
        $row = pg_fetch_assoc($resultado);
        return $row['id'];
    }

	public function testSearchGato() {
        $connection = pg_connect("host=silly.db.elephantsql.com dbname=ymobdwtv user=ymobdwtv password=6z7xnZXsb2DWh6_NWJdqvl8ObXlJMoWu");
        $gatosModel = new GatosModel();
        $data = 'Salem';
        $result = $gatosModel->searchGato($connection, $data);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        pg_close($connection);
    }

}

?>
