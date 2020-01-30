<?php

namespace classes;

abstract class Conexao
{
    private static $stringConexao = 'mysql:host=SERVER-JFG;dbname=meuestoque';
    private static $user = 'jayme';
    private static $senha = '@JFG1981';

    public static function conectarBD()
    {
        return new \PDO(self::$stringConexao, self::$user, self::$senha);
    }

    public static function carregar(string $tabela, string $id): array
    {
        $query = 'SELECT * FROM ' . $tabela . ' WHERE id = ' . $id;
        $conexao = self::conectarBD();
        $resultado = $conexao->query($query);
        return $resultado->fetch();
    }

    public static function listar(string $tabela, $query = null): array
    {
        if($query === null){
            $query = 'SELECT * FROM ' . $tabela;
        }
        $conexao = self::conectarBD();
        $resultado = $conexao->query($query);
        return $resultado->fetchAll();
    }

    public static function executarQuery(string $query)
    {
        $conexao = self::conectarBD();
        $conexao->exec($query);
    }

    public static function obterId(string $tabela, string $descricao): ?int
    {
        $query = 'SELECT * FROM ' . $tabela . ' WHERE descricao = ' . '"' . $descricao . '"';
        $conexao = self::conectarBD();
        $resultado = $conexao->query($query);
        $elemento = $resultado->fetch();
        if($elemento){
            return $elemento['id'];
        } else{
            return null;
        }
    }

    public static function lastId(string $tabela): int
    {
        $query = "SELECT id FROM $tabela ORDER BY id DESC";
        $conexao = self::conectarBD();
        $resultado = $conexao->query($query);
        $linha = $resultado->fetch();
        return $linha['id'];
    }
}