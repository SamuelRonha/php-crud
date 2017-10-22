<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 10:38
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../data/ProgramadorData.php';

$programadorData = new ProgramadorData();

$stmt = $programadorData->findAll();
$num = $stmt->rowCount();

if ($num > 0) {
    $programadorList = array();
    $programadorList["programador"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $programador = array(
            "id" => $id,
            "nome" => $nome,
            "idade" => $idade,
            "genero" => $genero,
            "hobby_id" => $hobby_id,
            "linguagem" => $linguagem
        );
        array_push($programadorList["programador"], $programador);
    }
    echo json_encode($programadorList);
} else {
    echo json_encode(
        array("menssagem" => "Programador não encontrado...")
    );
}