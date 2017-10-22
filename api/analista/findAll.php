<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 10:38
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../data/AnalistaData.php';

$analistaData = new AnalistaData();

$stmt = $analistaData->findAll();
$num = $stmt->rowCount();

if ($num > 0) {
    $analistaList = array();
    $analistaList["analista"] = array();
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
        array_push($analistaList["analista"], $analista);
    }
    echo json_encode($analistaList);
} else {
    echo json_encode(
        array("menssagem" => "Analista não encontrado...")
    );
}