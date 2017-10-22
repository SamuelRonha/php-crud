<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 11:12
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "../../data/ProgramadorData.php";
include_once "../../model/Programador.php";

$programadorData = new ProgramadorData();

$data = json_decode(file_get_contents("php://input"));
$programador = new Programador();

$programador->setId($data->id);
$programador->setNome($data->nome);
$programador->setGenero($data->genero);
$programador->setIdade($data->idade);
$programador->setHobbyId($data->hobby_id);
$programador->setProjeto($data->projeto);

if ($programadorData->edit($programador)) {
    echo '{';
    echo '"message": "Programador Criado."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Problemas de conexão."';
    echo '}';
}
