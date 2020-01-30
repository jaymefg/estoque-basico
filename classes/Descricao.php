<?php

namespace classes;

class Descricao
{
    private $id;
	private $descricao;
    private $quantidade;
    private $produtos;

    public function __construct(int $id = null)
	{
		if(!($id === null)){
            $this->id = $id;
            $this->carregar();
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
    
	private function carregar()
	{
        $conexao = Conexao::conectarBd();
        $query = "SELECT descricao, quantidade FROM descricoes WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();

		$descricao = $stmt->fetch();
        $this->descricao = $descricao['descricao'];
        $this->quantidade = $descricao['quantidade'];
    }
    
    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorDescricao($this->id);
    }

    public static function listar()
    {
        $query = "SELECT * FROM descricoes";
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function inserir()
    {
        $conexao = Conexao::conectarBd();
        $query = "INSERT INTO descricoes (descricao, quantidade) VALUES (:descricao, :quantidade)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":quantidade", $this->quantidade);
        $stmt->execute();
    }

    public function atualizar()
    {
        $conexao = Conexao::conectarBd();
        $query = "UPDATE descricoes SET descricao = :descricao, quantidade = :quantidade WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":quantidade", $this->quantidade);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
    }

    public function excluir(): bool
	{
		$query = 'DELETE FROM descricoes WHERE id = :id';
		$conexao = Conexao::conectarBd();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		return $stmt->execute();
	}
}