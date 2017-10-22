<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 10:38
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../data/HobbyData.php';

$hobbyData = new HobbyData();

$stmt = $hobbyData->findAll();
$num = $stmt->rowCount();

if ($num > 0) {
    $hobbyList = array();
    $hobbyList["hobby"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $hobby = array(
            "id" => $id,
            "nome" => $nome
        );
        array_push($hobbyList["hobby"], $hobby);
    }
    echo json_encode($hobbyList);
} else {
    echo json_encode(
        array("menssagem" => "Hobby não encontrado...")
    );
}