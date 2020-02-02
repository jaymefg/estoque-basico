<?php require_once 'autoload.php';
use classes\Categoria;

$categoria = new Categoria($_GET['id']);
?>

<?php require_once "html/cabecalho.html"; ?>

    <form id="form-categoria" action="actions/action-editar-categorias.php" method="post">
        <p id="par-categoria">Editar Categoria:</p>
        <input name="id-categoria" type="hidden" value="<?= $categoria->id ?>">
        <input id="nome-categoria" class="form-categoria-elementos" name="nome-categoria" type="text" placeholder='Nome' value="<?= $categoria->nome ?>" required>
        <button id="btn-submit" class="form-categoria-elementos" type="submit">Salvar</button>
    </form>

    <link rel="stylesheet" href="css/add-edt-categoria.css">

<?php require_once "html/rodape.html"; ?>