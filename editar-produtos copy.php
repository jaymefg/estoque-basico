<?php require_once 'autoload.php';
    use classes\Conexao;
    use classes\Descricao;
    use classes\Categoria;
    use classes\Produto;
    
    $categorias = Conexao::listar('categorias');
    if(count($_GET) > 0){
        $descr = new Descricao($_GET['desc_id']);
        $cat = new Categoria($_GET['cat_id']);
    }

    $produto = new Produto($_GET['p_id']);
?>

<?php require_once "html/cabecalho.html"; ?>

<div id="container-geral">

    <form id="form-add-produto" action="actions/action-editar-produtos.php" method="post" style="flex-direction: column">
        <input id="codigo" type="text" value="<?= $produto->codigo ?>">
        <input id="descricao" class="elemento-add" name="descricao" type="text" placeholder='Descrição' required>
        <input name="descricao_id" type="hidden" value="<?= $_GET['desc_id'] ?>">
        <input name="cat_id_anterior" type="hidden" value="<?= $_GET['cat_id'] ?>">
        <input id="precoVenda" class="elemento-add" name="precoVenda" type="number" step="0.01" placeholder='Preço de Venda' required>
        <select id="categoria" class="elemento-add" name="categoria_id">
            <?php foreach($categorias as $categoria): ?>
            <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
            <?php endforeach ?>
        </select>
        <div style="display: flex;">
            <button class="elemento-add" type="submit">Salvar Edição</button>
        </div>
    </form>

</div>

    <script src="js\adicionar-produto.js"></script>
    <script>
        carregarDadosInputProdutos(<?= $descr->id ?>, <?= $cat->id ?>, "<?= $descr->descricao ?>", <?= $_GET['preco'] ?>);
        document.getElementById("form-add-produto").disabled = false;
    </script>

<?php require_once "html/rodape.html"; ?>
