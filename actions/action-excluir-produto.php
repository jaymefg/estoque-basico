<?php
require_once 'autoload.php';

use classes\Produto;
use classes\Descricao;
use classes\Categoria;

$p = new Produto($_POST['p_id']);
$d = new Descricao($p->descricao_id);
$c = new Categoria($p->categoria_id);

$listaD = Produto::listarPorDescricao($d->id);

switch($_POST['valor']){
    
    case 'p':
        $p->excluir();
        $d->quantidade--;
        $d->atualizar();
        $c->quantidade--;
        $c->atualizar();
    break;

    case 'd':
        foreach($listaD as $produto){
            
            $prod = new Produto($produto['id']);
            $prod->excluir();
            
            $desc = new Descricao($produto['descricao_id']);
            $desc->quantidade--;
            $desc->atualizar();
            if($desc->quantidade == 0){
                $desc->excluir();
            }

            $cat = new Categoria($produto['categoria_id']);
            $cat->quantidade--;
            $cat->atualizar();
        }
    break;
}

header('Location:../produtos.php');
