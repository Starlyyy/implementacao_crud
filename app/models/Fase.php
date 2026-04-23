<?php 

namespace app\models;

class Fase{
    private int $id;
    private int $id_modulo;
    private string $tipo_fase;
    private string $nome;
    private string $conteudo;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_modulo
     */
    public function getIdModulo(): int
    {
        return $this->id_modulo;
    }

    /**
     * Set the value of id_modulo
     */
    public function setIdModulo(int $id_modulo): self
    {
        $this->id_modulo = $id_modulo;

        return $this;
    }

    /**
     * Get the value of tipo_fase
     */
    public function getTipoFase(): string
    {
        return $this->tipo_fase;
    }

    /**
     * Set the value of tipo_fase
     */
    public function setTipoFase(string $tipo_fase): self
    {
        $this->tipo_fase = $tipo_fase;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of conteudo
     */
    public function getConteudo(): string
    {
        return $this->conteudo;
    }

    /**
     * Set the value of conteudo
     */
    public function setConteudo(string $conteudo): self
    {
        $this->conteudo = $conteudo;

        return $this;
    }
}