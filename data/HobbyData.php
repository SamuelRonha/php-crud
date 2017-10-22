<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 09:54
 */

include_once('Database.php');

$database = new Database();

class HobbyData
{
    private $database;

    function __construct()
    {
        $this->database = new Database();
    }

    function save($hobby)
    {
        $sql = "insert into hobby (nome) values(:nome)";

        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':nome', $hobby->getNome(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    function findAll()
    {
        $sql = "select * from hobby h";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    function findByNome($nome)
    {
        $sql = "select * from hobby h where h.nome LIKE :nome";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }

    function findOne($id)
    {
        $sql = "select * from hobby h where h.id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function edit($hobby)
    {
        $sql = "update hobby set nome = :nome where id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $hobby->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $hobby->getNome(), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }

    function delete($id)
    {
        $sql = "delete from hobby where id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}