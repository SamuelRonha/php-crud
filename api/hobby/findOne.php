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

include_once "../../data/HobbyData.php";
include_once "../../model/Hobby.php";

$hobbyData = new HobbyData();
$id = isset($_GET['id']) ? $_GET['id'] : die();
//$hobby = new Hobby();

$stmt = $hobbyData->findOne($id);
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
