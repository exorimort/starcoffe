<?php

namespace StarCoffe;

class Item
{
    private $cafe;
    private $quantidade;
    private $valor;

    public function __construct(Cafe $cafe, $quantidade, $valor)
    {
        $this->cafe = $cafe;
        $this->quantidade = $quantidade;
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->quantidade * $this->valor;
    }

    public function getNome()
    {
        return (string)$this->cafe;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
}

