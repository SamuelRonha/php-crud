<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 11:12
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once "../../data/HobbyData.php";
include_once "../../model/Hobby.php";

$hobbyData = new HobbyData();

$nome = isset($_GET['nome']) ? $_GET['nome'] : die();

$stmt = $hobbyData->findByNome($nome);
$num = $stmt->rowCount();

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $hobby = array(
            "id" => $id,
            "nome" => $nome
        );
    }
    echo json_encode($hobby);
} else {
    echo json_encode(
        array("menssagem" => "Hobby não encontrado...")
    );
}