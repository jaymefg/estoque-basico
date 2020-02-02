<?php

namespace classes;

abstract class UsuarioReposity
{
    protected function carregar($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        
        $v = $stmt->fetch();
        $this->id = $v['id'];
        $this->nome = $v['nome'];
        $this->senha = $v['senha'];
        $this->acesso = $v['acesso'];
    }

    public static function listar()
    {
        $conexao = Conexao::conectarBd();
        $query = "SELECT * FROM users";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public static function listarPorNomeSenha($nome, $senha)
    {
        $conexao = Conexao::conectarBd();
        $query = "SELECT * FROM users WHERE nome = :nome AND senha = :senha";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":senha", md5($senha));
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function atualizar(): bool
    {
        $query = 'UPDATE users SET nome = :nome, senha = :senha, acesso = :acesso WHERE id = :id';
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":senha", md5($this->senha));
        $stmt->bindValue(":acesso", $this->acesso);
        $stmt->bindValue(":id", $this->id);

        return $stmt->execute();
    }

    public function inserir(): bool
    {
        $query = 'INSERT INTO users (nome, senha, acesso) VALUES (:nome, :senha, :acesso)';
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":senha", md5($this->senha));
        $stmt->bindValue(":acesso", $this->acesso);
        
        return $stmt->execute();
    }

    public function excluir(): bool
    {
        $query = 'DELETE FROM users WHERE id = :id';
        $conexao = Conexao::conectarBd();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        
        return $stmt->execute();
    }
}