<?php require_once "autoload.php";

use classes\Produto;
use classes\Categoria;

$categorias = Categoria::listar();

?>

<?php require_once "html/cabecalho.html"; ?>

<div id="container-geral">

    <div id="container-tabela">

        <table id="lista-produtos" class="tabela-padrao">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody id="corpo-tabela"> 
                <?php foreach($categorias as $categoria): ?>
                    <tr>
                        <td><?php echo $categoria['nome']; ?></td>
                        <td><?php echo $categoria['quantidade'] ?></td>
                        <td><a href="editar-categorias.php?id=<?= $categoria['id']; ?>">Editar</a></td>
                        <td><a id="btn-excluir" onclick="confirmarExclusao(<?= $categoria['id']; ?>)" href="#">Excluir</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    <form id="form-add-categoria" action="adicionar-categorias.php">
        <button>Adicionar Nova Categaria</button>
    </form>

</div>

<link rel="stylesheet" href="css/categorias.css">
<script src="js/categorias.js"></script>

<?php require_once "html/rodape.html"; ?>