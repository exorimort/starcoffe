<?php

namespace StarCoffe;

class CafeValorRepository
{
    private $valorPorCafe = array(
        Cafe::EXPRESSO => 3,
        Cafe::LONGO => 5,
        Cafe::DUPLO => 7,
    );

    public function find(Cafe $cafe)
    {
        return $this->valorPorCafe[$cafe->getTamanho()];
    }
}