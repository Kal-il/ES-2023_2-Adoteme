<?php 
namespace models;
use PDOException;

class Connection {
    private $host = 'dpg-ckp7qbfkc2qc73doaqk0-a.ohio-postgres.render.com';
    private $port = '5432';
    private $dbname = 'db_adoteme_dev_ldw6';
    private $user = 'adotemeadmin'; 
    private $password = 'FSsCgKHuKSzlW9rBOLc4wKpwDayqKyvC';
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
