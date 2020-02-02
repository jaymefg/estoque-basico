<?php

namespace classes;

abstract class VendaReposity
{
    protected function carregar($id)
    {
        $query = "SELECT * FROM vendas WHERE id = :id";
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        
        $v = $stmt->fetch();
        $this->id = $v['id'];
        $this->data_venda = $v['data_venda'];
        $this->usuario_id = $v['usuario_id'];
        $this->produto_id = $v['produto_id'];

    }

    public static function listar()
    {
        $conexao = Conexao::conectarBd();
        $query = "SELECT * FROM vendas";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function atualizar(): bool
    {
        $query = 'UPDATE vendas SET data_venda = :data_venda, usuario_id = :usuario_id, produto_id = :produto_id WHERE id = :id';
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":data_venda", $this->data_venda);
        $stmt->bindValue(":usuario_id", $this->usuario_id);
        $stmt->bindValue(":produto_id", $this->produto_id);
        $stmt->bindValue(":id", $this->id);

        return $stmt->execute();
    }

    public function inserir(): bool
    {
        $query = 'INSERT INTO vendas (data_venda, usuario_id, produto_id) VALUES (:data_venda, :usuario_id, :produto_id)';
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":data_venda", $this->data_venda);
        $stmt->bindValue(":usuario_id", $this->usuario_id);
        $stmt->bindValue(":produto_id", $this->produto_id);
        
        return $stmt->execute();
    }

    public function excluir()
    {
        $query = 'DELETE FROM vendas WHERE id = :id';
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        
        return $stmt->execute();
    }
}