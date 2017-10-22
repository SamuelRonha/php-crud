<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 10:38
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once "../../data/ProgramadorData.php";
include_once "../../model/Programador.php";

$programadorData = new ProgramadorData();

$id = isset($_GET['id']) ? $_GET['id'] : die();
//$programador = new Programador();

$stmt = $programadorData->findOne($id);
$num = $stmt->rowCount();

if ($num > 0) {
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
    }
    echo json_encode($programador);
} else {
    echo json_encode(
        array("menssagem" => "Programador não encontrado...")
    );
}
