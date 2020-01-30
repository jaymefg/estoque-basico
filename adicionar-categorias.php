<?php require_once 'autoload.php';

?>

<?php require_once "html/cabecalho.html"; ?>

<form action="actions/action-adicionar-categorias.php" method="post" style="flex-direction: column">
    <input id="nome-categoria" class="elemento-add" name="nome-categoria" type="text" placeholder='Nome' required>
    <div style="display: flex;">
        <button class="elemento-add" type="submit">Salvar Categoria</button>
    </div>
</form>

<?php require_once "html/rodape.html"; ?>