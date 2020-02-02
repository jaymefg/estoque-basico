<?php
ini_set('default_character', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once 'autoload.php';

use classes\Categoria;
use classes\Descricao;
use classes\Produto;
use classes\Usuario;

$usuario = new Usuario(2);
$usuario->excluir();

$lista = Usuario::listar();
echo '<pre>';
var_dump($lista);
echo '<pre>';
