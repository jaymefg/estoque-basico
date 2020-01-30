<?php 

namespace classes;

class Produto{

	private $id;
	private $codigo;
	private $marca;
	private $precoCompra;
	private $precoVenda;
	private $dataCompra;
	private $dataVenda;
	private $quantidade;
	private $descricao_id;
	private $categoria_id;

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
        $query = "SELECT codigo, marca, precoCompra, precoVenda, dataCompra, dataVenda, descricao_id, categoria_id FROM produtos WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();

		$produto = $stmt->fetch();
		
		$this->codigo = $produto['codigo'];
		$this->marca = $produto['marca'];
		$this->precoCompra = $produto['precoCompra'];
		$this->precoVenda = $produto['precoVenda'];
		$this->dataCompra = $produto['dataCompra'];
		$this->dataVenda = $produto['dataVenda'];
		$this->descricao_id = $produto['descricao_id'];
		$this->categoria_id = $produto['categoria_id'];
	}

	public static function listar()
	{
		$query = 'SELECT p.id, p.codigo, p.marca, p.descricao_id, p.precoVenda, p.precoCompra, p.dataCompra, p.dataVenda, ';
		$query .= 'd.quantidade AS quantidade, p.categoria_id, c.nome AS categoria , d.descricao AS descricao FROM produtos p ';
		$query .= 'INNER JOIN categorias c ON p.categoria_id = c.id ';
		$query .= 'INNER JOIN descricoes d ON p.descricao_id = d.id';
		$conexao = Conexao::conectarBd();
		$stmt = $conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public static function listarPorCategoria($categoria_id)
	{
		$query = "SELECT p.id, p.codigo, p.marca, p.precoCompra, p.precoVenda, p.dataCompra, p.dataVenda, p.descricao_id, p.categoria_id, ";
		$query .= "c.nome AS categoria, d.descricao FROM produtos p ";
		$query .= "INNER JOIN descricoes d ON descricao_id = d.id ";
		$query .= "INNER JOIN categorias c ON categoria_id = c.id ";
		$query .= "WHERE categoria_id = :categoria_id";
		$conexao = Conexao::conectarBd();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':categoria_id', $categoria_id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public static function listarPorDescricao($descricao_id)
	{
		$query = "SELECT p.id, p.codigo, p.marca, p.precoCompra, p.precoVenda, p.dataCompra, p.dataVenda, p.descricao_id, p.categoria_id, ";
		$query .= "c.nome AS categoria, d.descricao FROM produtos p ";
		$query .= "INNER JOIN descricoes d ON descricao_id = d.id ";
		$query .= "INNER JOIN categorias c ON categoria_id = c.id ";
		$query .= "WHERE descricao_id = :descricao_id";
		$conexao = Conexao::conectarBd();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':descricao_id', $descricao_id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public static function listarPorCodigo($codigo)
	{
		$query = "SELECT p.id, p.codigo, p.marca, p.precoCompra, p.precoVenda, p.dataCompra, p.dataVenda, p.descricao_id, p.categoria_id, ";
		$query .= "c.nome AS categoria, d.descricao FROM produtos p ";
		$query .= "INNER JOIN descricoes d ON descricao_id = d.id ";
		$query .= "INNER JOIN categorias c ON categoria_id = c.id ";
		$query .= "WHERE p.codigo = :codigo";
		$conexao = Conexao::conectarBd();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':codigo', $codigo);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function inserir()
    {
        $conexao = Conexao::conectarBd();
		
		$query = "INSERT INTO produtos (codigo, marca, precoCompra, precoVenda, dataCompra, dataVenda, descricao_id, categoria_id) ";
		$query .= "VALUES (:codigo, :marca, :precoCompra, :precoVenda, :dataCompra, :dataVenda, :descricao_id, :categoria_id)";
		
		$stmt = $conexao->prepare($query);
        $stmt->bindValue(":codigo", $this->codigo);
		$stmt->bindValue(":marca", $this->marca);
		$stmt->bindValue(":precoCompra", $this->precoCompra);
		$stmt->bindValue(":precoVenda", $this->precoVenda);
		$stmt->bindValue(":dataCompra", $this->dataCompra);
		$stmt->bindValue(":dataVenda", $this->dataVenda);
		$stmt->bindValue(":descricao_id", $this->descricao_id);
		$stmt->bindValue(":categoria_id", $this->categoria_id);
        $stmt->execute();
    }

    public function atualizar()
    {
        $conexao = Conexao::conectarBd();
		
		$query = "UPDATE produtos SET codigo = :codigo, marca = :marca, precoCompra = :precoCompra, precoVenda = :precoVenda, ";
		$query .= "dataCompra = :dataCompra, dataVenda = :dataVenda, descricao_id = :descricao_id, categoria_id = :categoria_id ";
		$query .= "WHERE id = :id";
		
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(":id", $this->id);
        $stmt->bindValue(":codigo", $this->codigo);
		$stmt->bindValue(":marca", $this->marca);
		$stmt->bindValue(":precoCompra", $this->precoCompra);
		$stmt->bindValue(":precoVenda", $this->precoVenda);
		$stmt->bindValue(":dataCompra", $this->dataCompra);
		$stmt->bindValue(":dataVenda", $this->dataVenda);
		$stmt->bindValue(":descricao_id", $this->descricao_id);
		$stmt->bindValue(":categoria_id", $this->categoria_id);
        $stmt->execute();
	}

	public function excluir(): bool
	{
		$query = 'DELETE FROM produtos WHERE id = :id';
		$conexao = Conexao::conectarBd();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		return $stmt->execute();
	}

	public function getPrecoVenda()
	{
		return $this->formataSaldo($this->precoVenda);
	}

	private function formataSaldo($precoVenda) 
	{									 
		return number_format($precoVenda, 2, ",", ".");
	}
}