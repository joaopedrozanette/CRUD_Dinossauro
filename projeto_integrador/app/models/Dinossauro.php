<?php

namespace app\models;

class Dinossauro
{
    private ?int $id = null;
    private string $nome;
    private string $especie;
    private string $periodo;
    private string $descricao;
    private string $imagem;

    

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
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
     * Get the value of especie
     */
    public function getEspecie(): string
    {
        return $this->especie;
    }

    /**
     * Set the value of especie
     */
    public function setEspecie(string $especie): self
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get the value of periodo
     */
    public function getPeriodo(): string
    {
        return $this->periodo;
    }

    /**
     * Set the value of periodo
     */
    public function setPeriodo(string $periodo): self
    {
        $this->periodo = $periodo;

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
     * Get the value of imagem
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     */
    public function setImagem(string $imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }
    }
