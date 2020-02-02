<?php

namespace classes;

class Usuario extends UsuarioReposity
{
    protected $id;
    protected $nome;
	protected $senha;
	private $ehLogado;

    public function __construct(int $id = null)
	{
		if(!($id === null)){
			$this->carregar($id);
			$this->ehLogado = false;
        }
	}

	public function __get($atributo)
	{
		return $this->$atributo;
	}

	public function __set($atributo, $valor)
	{
		if($atributo != 'id'){
			$this->$atributo = $valor;
		}
	}
}
