<?php

namespace classes;

class Categoria
{
    private $id;
	private $nome;
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
        $query = "SELECT nome, quantidade FROM categorias WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();

		$cat = $stmt->fetch();
        $this->nome = $cat['nome'];
        $this->quantidade = $cat['quantidade'];
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorCategoria($this->id);
    }

    public static function listar()
    {
        $query = "SELECT * FROM categorias";
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function inserir()
    {
        $conexao = Conexao::conectarBd();
        $query = "INSERT INTO categorias (nome, quantidade) VALUES (:nome, :quantidade)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":quantidade", $this->quantidade);
        $stmt->execute();
    }

    public function atualizar()
    {
        $conexao = Conexao::conectarBd();
        $query = "UPDATE categorias SET nome = :nome, quantidade = :quantidade WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":quantidade", $this->quantidade);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $conexao = Conexao::conectarBd();
        $query = "DELETE FROM categorias WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
    }
}
