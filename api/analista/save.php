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


include_once "../../data/AnalistaData.php";
include_once "../../model/Analista.php";

$analistaData = new AnalistaData();

$data = json_decode(file_get_contents("php://input"));
$analista = new Analista();

$analista->setNome($data->nome);
$analista->setGenero($data->genero);
$analista->setIdade($data->idade);
$analista->setHobbyId($data->hobby_id);
$analista->setProjeto($data->projeto);

if ($analistaData->save($analista)) {
    echo '{';
    echo '"message": "Analista Criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Problemas de conexão."';
    echo '}';
}
