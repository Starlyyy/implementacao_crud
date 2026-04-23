<?php

namespace app\models;

class Modulo{
    private int $id;
    private string $nome;
    private string $descricao;
    private string $min_estrelas_liberacao;
    private string $material_apoio;

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
     * Get the value of descricao
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of min_estrelas_liberacao
     */
    public function getMinEstrelasLiberacao(): string
    {
        return $this->min_estrelas_liberacao;
    }

    /**
     * Set the value of min_estrelas_liberacao
     */
    public function setMinEstrelasLiberacao(string $min_estrelas_liberacao): self
    {
        $this->min_estrelas_liberacao = $min_estrelas_liberacao;

        return $this;
    }

    /**
     * Get the value of material_apoio
     */
    public function getMaterialApoio(): string
    {
        return $this->material_apoio;
    }

    /**
     * Set the value of material_apoio
     */
    public function setMaterialApoio(string $material_apoio): self
    {
        $this->material_apoio = $material_apoio;

        return $this;
    }
}