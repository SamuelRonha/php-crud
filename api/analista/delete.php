<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 13:55
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../../data/AnalistaData.php';

$analistaData = new AnalistaData();

$id = isset($_GET['id']) ? $_GET['id'] : die();

if ($analistaData->delete($id)) {
    echo '{';
    echo '"message": "Analista excluido."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Não foi possivel excluir o Analista"';
    echo '}';
}