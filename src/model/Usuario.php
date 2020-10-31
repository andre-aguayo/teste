<?php

namespace andreaguayo\teste\model;

class Usuario
{
    private $id;
    private $nome;
    private $altura;
    private $lactose;
    private $peso;
    private $atleta;

    public function __construct(
        int $id,
        string $nome,
        float $altura,
        bool $lactose,
        float $peso,
        bool $atleta
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->altura = $altura;
        $this->lactose = $lactose;
        $this->peso = $peso;
        $this->atleta = $atleta;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getAltura(): float
    {
        return $this->altura;
    }

    public function getLactose(): bool
    {
        return $this->lactose;
    }

    public function getPeso(): float
    {
        return $this->peso;
    }

    public function getAtleta(): bool
    {
        return $this->atleta;
    }
}
