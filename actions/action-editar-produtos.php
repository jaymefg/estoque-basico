<?php require_once __DIR__ . '/../autoload.php';

use classes\Descricao;
use classes\Categoria;
use classes\Produto;

switch($_POST['valor']){
    case 'i':
        $produto = new Produto($_POST['p_id']);
        $produto->codigo = $_POST['codigo'];
        $produto->precoCompra = $_POST['precoCompra'];
        $produto->precoVenda = $_POST['precoVenda'];
        $produto->dataCompra = $_POST['dataCompra'];
        $produto->descricao_id = $_POST['descricao_id'];
        $produto->categoria_id = $_POST['categoria_id'];
        $produto->atualizar();

        if(!($_POST['cat_id_anterior'] === $_POST['categoria_id'])){
            $catAnterior = new Categoria($_POST['cat_id_anterior']);
            $catNova = new Categoria($_POST['categoria_id']);
            $catAnterior->quantidade--;
            $catNova->quantidade++;
            $catAnterior->atualizar();
            $catNova->atualizar();
        }
        break;

    case 'm':
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
        break;
}

header('Location:../produtos.php');