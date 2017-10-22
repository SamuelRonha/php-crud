<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 09:28
 */

include_once "Funcionario.php";
class Analista extends Funcionario
{
    private $projeto;

    /**
     * @return mixed
     */
    public function getProjeto()
    {
        return $this->projeto;
    }

    /**
     * @param mixed $projeto
     */
    public function setProjeto($projeto)
    {
        $this->projeto = $projeto;
    }


}