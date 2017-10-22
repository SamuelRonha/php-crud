<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 09:34
 */

class Database
{
    /**
     * @var host local(onde esta o banco de dados.)
     */
    private $host = "localhost";

    /**
     * @var padrão mysql
     */
    private $port = "3306";
    /**
     * @var nome da base de dados criada.
     */
    private $db_name = "crud";
    /**
     * @var nome do usuário(master padrão mysql -> root)
     */
    private $username = "samuel";
    /**
     * @var senha do usuário informado.
     */
    private $password = "samuel";

    public $conn;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $dbf = 'mysql:host=' . $this->host .
            ';port=' . $this->port .
            ';dbname=' . $this->db_name;
        try {
            $this->conn = new PDO($dbf, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $ex) {
            echo "Erro na conexão com o banco: " . ($ex->getMessage());
        }
        return $this->conn;
    }

    /**
     * @return PDO
     */
    public function getConn()
    {
        return $this->conn;
    }


}