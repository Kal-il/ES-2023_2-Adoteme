<?php 
namespace models;
use PDOException;

class Connection {
    private $host = 'localhost';
    private $port = '5433';
    private $dbname = 'db_adoteme';
    private $user = 'postgres'; 
    private $password = 'postgres';
    private $connection;

    function getConnection(){
        try {
            $this->connection = pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password");
            return $this->connection;
        } catch (\PDOException $error) {
            echo "Erro na conexão: " . $error->getMessage();
           
        }
    }
}
?>
