<?php

namespace classes;

class Venda extends VendaReposity
{
    protected $id;
    protected $data_venda;
    protected $usuario_id;
    protected $produto_id;

    public function __construct(int $id = null)
	{
		if(!($id === null)){
			$this->carregar($id);
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
