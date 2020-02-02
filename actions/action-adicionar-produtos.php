<?php require_once __DIR__ . '/../autoload.php';

use classes\Conexao;
use classes\Descricao;
use classes\Categoria;
use classes\Produto;

$produto = new Produto();
$produto->precoCompra = $_POST['precoCompra'];
$produto->precoVenda = $_POST['precoVenda'];
$produto->categoria_id = $_POST['categoria'];
$produto->dataCompra = $_POST['dataCompra'];
$produto->e_disponivel = true;
$quantidade = count($_POST['codigosProdutos']);

$categoria = new Categoria($_POST['categoria']);
$categoria->quantidade += $quantidade;
$categoria->atualizar();

switch ($_POST['tipo']) {
    case 'adicionar':
        $descricao = new Descricao();
        $descricao->descricao = $_POST['descricao'];
        $descricao->quantidade = $quantidade;
        $descricao->inserir();
        $produto->descricao_id = Conexao::lastId('descricoes');
        break;
    
    case 'add':
        $produto->descricao_id = $_POST['descricao_id'];
        $descricao = new Descricao($_POST['descricao_id']);
        $descricao->quantidade += $quantidade;
        $descricao->atualizar();
        break;
}

foreach ($_POST['codigosProdutos'] as $codigo) {
    $produto->codigo = $codigo;
    $produto->inserir();
}

header('Location:../produtos.php');
