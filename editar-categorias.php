<?php require_once 'autoload.php';

use classes\Categoria;

$categoria = new Categoria($_GET['id']);

?>

<?php require_once "html/cabecalho.html"; ?>

<form action="actions/action-editar-categorias.php" method="post" style="flex-direction: column">
    <input id="nome-categoria" class="elemento-add" name="nome-categoria" type="text" placeholder='Nome' required value="<?= $categoria->nome ?>">
    <input name="id-categoria" type="hidden" value="<?= $categoria->id ?>">
    <div style="display: flex;">
        <button class="elemento-add" type="submit">Salvar Categoria</button>
    </div>
</form>

<?php require_once "html/rodape.html"; ?>