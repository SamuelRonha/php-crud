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

include_once "../../data/AnalistaData.php";
include_once "../../model/Analista.php";

$analistaData = new AnalistaData();
$analistaData = new AnalistaData();

$nome = isset($_GET['nome']) ? $_GET['nome'] : die();

$stmt = $analistaData->findByNome($nome);
$num = $stmt->rowCount();

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $analista = array(
            "id" => $id,
            "nome" => $nome,
            "idade" => $idade,
            "genero" => $genero,
            "hobby_id" => $hobby_id,
            "hobby_nome" => $hobby_nome
        );
    }
    echo json_encode($analista);
} else {
    echo json_encode(
        array("menssagem" => "Analista não encontrado...")
    );
}