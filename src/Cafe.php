<?php

namespace StarCoffe;
use Exception;

class Cafe
{
	const EXPRESSO = 'expresso';
	const LONGO = 'longo';
	const DUPLO = 'duplo';

	private $tamanho;

	private $tamanhosValidos = array(
		self::EXPRESSO,
		self::LONGO,
		self::DUPLO
	);
	
	public function __construct($tamanho)
	{
		if (!in_array($tamanho, $this->tamanhosValidos)) {
			throw new Exception('O tamanho "'. $tamanho .'" é inválido!');
		}
		
		$this->tamanho = $tamanho;
	}

	public function getTamanho()
	{
		return $this->tamanho;
	}

	public function __toString()
	{
		return $this->tamanho;
	}
}