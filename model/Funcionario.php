<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 22/10/2017
 * Time: 09:21
 */

class Funcionario
{
    public $id;
    public $nome;
    public $genero;
    public $idade;
    public $hobby_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @param mixed $idade
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    /**
     * @return mixed
     */
    public function getHobbyId()
    {
        return $this->hobby_id;
    }

    /**
     * @param mixed $hobby_id
     */
    public function setHobbyId($hobby_id)
    {
        $this->hobby_id = $hobby_id;
    }
}