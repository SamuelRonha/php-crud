<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 11:12
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "../../data/HobbyData.php";
include_once "../../model/Hobby.php";

$hobbyData = new HobbyData();

$data = json_decode(file_get_contents("php://input"));
$hobby = new Hobby();

$hobby->setNome($data->nome);

if ($hobbyData->save($hobby)) {
    echo '{';
    echo '"message": "Hobby Criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Problemas de conexão."';
    echo '}';
}
