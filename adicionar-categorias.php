<?php require_once 'autoload.php';

?>

<?php require_once "html/cabecalho.html"; ?>

    <form id="form-categoria" action="actions/action-adicionar-categorias.php" method="post">
        <p id="par-categoria">Adicionar Categoria:</p>
        <input id="nome-categoria" class="form-categoria-elementos" name="nome-categoria" type="text" placeholder='Nome' required>
        <button id="btn-submit" class="form-categoria-elementos" type="submit">Salvar</button>
    </form>

    <link rel="stylesheet" href="css/add-edt-categoria.css">

<?php require_once "html/rodape.html"; ?>