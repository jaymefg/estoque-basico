<?php

require_once "autoload.php";
use classes\Conexao;
use classes\Descricao;
use classes\Categoria;
use classes\Produto;

$produtosIds = Produto::listarPorDescricao($_POST['descricao_id']);
$quantidade = count($produtosIds);

if(!($_POST['cat_id_anterior'] === $_POST['categoria_id'])){
    $catAnterior = new Categoria($_POST['cat_id_anterior']);
    $catNova = new Categoria($_POST['categoria_id']);
    $catAnterior->quantidade -= $quantidade;
    $catNova->quantidade += $quantidade;
    $catAnterior->atualizar();
    $catNova->atualizar();
}

foreach ($produtosIds as $id) {
    $produto = new Produto($id['id']);
    $produto->categoria_id = $_POST['categoria_id'];
    $produto->precoVenda = $_POST['precoVenda'];
    $produto->atualizar();
}

$descricao = new Descricao($_POST['descricao_id']);
$descricao->descricao = $_POST['descricao'];
$descricao->atualizar();

header('Location:../produtos.php');