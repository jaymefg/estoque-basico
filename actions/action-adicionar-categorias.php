<?php require_once 'autoload.php';

use classes\Categoria;

$categoria = new Categoria();
$categoria->nome = $_POST['nome-categoria'];
$categoria->quantidade = 0;
$categoria->inserir();

header('Location:../categorias.php');
