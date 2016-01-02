<?php

namespace StarCoffe;

class CaixaRegistradora
{
	private $itens = [];

	public function total()
	{
		$total = 0;

		foreach ($this->itens as $item) {
			$total = $total + $item->getValor();
		}

		return $total;
	}

	public function registrar(Item $item)
	{
		$this->itens[] = $item;
	}

	public function getItens()
	{
		return $this->itens;
	}
}