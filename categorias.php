<?php
ini_set('default_charset','UTF-8');
ini_set("display_errors",1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once "autoload.php";
use classes\Produto;
use classes\Categoria;

$categorias = Categoria::listar();

?>

<?php require_once "html/cabecalho.html"; ?>
<main>
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
                    <td><a href="excluir-categorias.php?id=<?= $categoria['id']; ?>&nome=<?= $categoria['nome']; ?>">Excluir</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
    <form action="adicionar-categorias.php">
        <button>Adicionar Nova Categaria</button>
    </form>
</main>
<?php require_once "html/rodape.html"; ?>