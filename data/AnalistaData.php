<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 09:54
 */

include_once('Database.php');

$database = new Database();

class AnalistaData
{
    private $database;

    function __construct()
    {
        $this->database = new Database();
    }

    function save($analista)
    {
        $sql = "insert into analista (nome, genero, idade, hobby_id, projeto) values(:nome, :genero, :idade, :hobby_id, :projeto)";

        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':nome', $analista->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':genero', $analista->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':idade', $analista->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':hobby_id', $analista->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $analista->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':projeto', $analista->getNome(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    function findAll()
    {
        $sql = "select * from analista h";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    function findByNome($nome)
    {
        $sql = "select * from analista h where h.nome LIKE :nome";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }

    function findOne($id)
    {
        $sql = "select * from analista h where h.id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function edit($analista)
    {
        $sql = "update analista set nome = :nome, genero = :genero, idade = :idade, hobby_id = :hobby_id, projeto =:projeto  where id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $analista->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $analista->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':genero', $analista->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':idade', $analista->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':hobby_id', $analista->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':projeto', $analista->getNome(), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }

    function delete($id)
    {
        $sql = "delete from analista where id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}