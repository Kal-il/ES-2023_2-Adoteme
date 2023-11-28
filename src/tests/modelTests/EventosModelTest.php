<?php 

use PHPUnit\Framework\TestCase;
use models\EventosModel;
use models\Connection;


class EventosModelTest extends TestCase {
    public function testEventosModelGetEventos (){
        // Testando se a função getEventos retorna um array

        $evento = new EventosModel();
        $connection = new Connection();
        $connection = $connection -> getConnection();
        $this->assertIsArray($evento->getEventos($connection));
    }

    public function testEventosModelGetId(){
        // Testando se a função getEventosById retorna um array

        $evento = new EventosModel();
        $connection = new Connection();
        $connection = $connection -> getConnection();
        $id = 1;
        $this->assertIsArray($evento->getEventosById($connection, $id));
    }


    function testEventosModelCadastro (){
        // Testando se o cadastro de eventos funciona com dados vazios

        $evento = new EventosModel();
        $connection = new Connection();
        $connection = $connection -> getConnection();
        $nome = '';
        $foto = '';
        $data = array('nome' => $nome, 'foto' => $foto);
        $this->assertFalse($evento->createEventos($connection, $data));

    }
}
