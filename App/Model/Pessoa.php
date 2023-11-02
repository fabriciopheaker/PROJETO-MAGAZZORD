<?php

namespace App\Model;

/**
 * Pessoa
 */
class Pessoa
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $cpf;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome.
     *
     * @param string $nome
     *
     * @return Pessoa
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cpf.
     *
     * @param string $cpf
     *
     * @return Pessoa
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf.
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }
}
