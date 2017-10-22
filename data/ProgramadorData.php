<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 09:54
 */

include_once('Database.php');

$database = new Database();

class ProgramadorData
{
    private $database;

    function __construct()
    {
        $this->database = new Database();
    }

    function save($programador)
    {
        $sql = "insert into programador (nome, genero, idade, hobby_id, linguagem) values(:nome, :genero, :idade, :hobby_id, :linguagem)";

        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':nome', $programador->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':genero', $programador->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':idade', $programador->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':hobby_id', $programador->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $programador->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':linguagem', $programador->getNome(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    function findAll()
    {
        $sql = "select * from programador h";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    function findByNome($nome)
    {
        $sql = "select * from programador h where h.nome LIKE :nome";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }

    function findOne($id)
    {
        $sql = "select * from programador h where h.id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function edit($programador)
    {
        $sql = "update analista set nome = :nome, genero = :genero, idade = :idade, hobby_id = :hobby_id, linguagem =:linguagem  where id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $programador->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $programador->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':genero', $programador->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':idade', $programador->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':hobby_id', $programador->getNome(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $programador->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':linguagem', $programador->getNome(), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }

    function delete($id)
    {
        $sql = "delete from programador where id = :id";
        $stmt = $this->database->getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}