<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 09:30
 */
include_once "Funcionario.php";

class Programador
{
    private $linguagem;

    /**
     * @return mixed
     */
    public function getLinguagem()
    {
        return $this->linguagem;
    }

    /**
     * @param mixed $linguagem
     */
    public function setLinguagem($linguagem)
    {
        $this->linguagem = $linguagem;
    }


}