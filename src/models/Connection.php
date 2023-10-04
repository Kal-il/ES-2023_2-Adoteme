<?php 
namespace models;
use PDOException;

class Connection {
    private $host = 'silly.db.elephantsql.com';
    private $port = '5432';
    private $dbname = 'ymobdwtv';
    private $user = 'ymobdwtv'; 
    private $password = '6z7xnZXsb2DWh6_NWJdqvl8ObXlJMoWu';
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
