<?php require_once __DIR__ . '/../autoload.php';

use classes\Categoria;

$categoria = new Categoria($_POST['id-categoria']);
$categoria->nome = $_POST['nome-categoria'];
$categoria->atualizar();

header('Location:../categorias.php');