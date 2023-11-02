<?php

namespace App\Model;

/**
 * Contato
 */
class Contato
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $tipo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \App\Model\Pessoa
     */
    private $pessoa;


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
     * Set tipo.
     *
     * @param bool $tipo
     *
     * @return Contato
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo.
     *
     * @return bool
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set descricao.
     *
     * @param string $descricao
     *
     * @return Contato
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao.
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set pessoa.
     *
     * @param \App\Model\Pessoa|null $pessoa
     *
     * @return Contato
     */
    public function setPessoa(\App\Model\Pessoa $pessoa = null)
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    /**
     * Get pessoa.
     *
     * @return \App\Model\Pessoa|null
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }
}
