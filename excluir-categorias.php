<?php require_once "html/cabecalho.html"; ?>

<form method="post" style="flex-direction: column">
    <div" style="text-align: center">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <p>Tem certeza que deseja excluir a categoria <?= $_GET['nome'] ?></p>
        <button class="elemento-add" type="submit" formaction="actions/action-excluir-categorias.php">Sim</button>
        <button class="elemento-add" type="submit" formaction="categorias.php">Não</button>
    </div>
</form>

<?php require_once "html/rodape.html"; ?>