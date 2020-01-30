<?php require_once 'autoload.php';
    use classes\Conexao;
    use classes\Descricao;
    use classes\Categoria;
    
    $categorias = Conexao::listar('categorias');
    if(count($_GET) > 0){
        $descr = new Descricao($_GET['desc_id']);
        $cat = new Categoria($_GET['cat_id']);
    }
?>

<?php require_once "html/cabecalho.html"; ?>
    <form id="form-adicionar" action="actions/action-adicionar-produtos.php" method="post" style="flex-direction: column">
        <div id="container-codigos"></div>
        <input name='tipo' type="hidden" value="add">
        <input id="descricao" class="elemento-add" name="descricao" type="text" placeholder='Descrição' required>
        <input id="precoCompra" class="elemento-add" name="precoCompra" type="number" step="0.01" placeholder='Preço de Compra' required>
        <input id="precoVenda" class="elemento-add" name="precoVenda" type="number" step="0.01" placeholder='Preco de Venda' required>
        <label for="dataCompra">Data de Compra:</label>
        <input id="dataCompra" class="elemento-add" name="dataCompra" type="date" required>
        <select id="categoria" class="elemento-add" name="categoria">
            <?php foreach($categorias as $categoria): ?>
            <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
            <?php endforeach ?>
        </select>
        <div style="display: flex;">
            <input id="codigos" style="flex: 4; margin-bottom: .5rem" type="text" placeholder="Códido do Produto">
            <button class="elemento-add" type="button" onclick="adicionarCodigo()">Inserir Código</button>
            <button class="elemento-add" type="submit">Salvar Produtos</button>
        </div>
    </form>
    <div id="container-tabela-pequena">
        <table>
            <thead>
                <tr>
                    <th>Códigos</th>
                </tr>
            </thead>
            <tbody id="lista-codigos">
            </tbody>
        </table>
    </div>
    
    <script src="js\adicionar-produto.js"></script>
    <script>
        carregarDadosInputProdutos(<?= $descr->id ?>, <?= $cat->id ?>, "<?= $descr->descricao ?>", <?= $_GET['preco'] ?>);
    </script>

<?php require_once "html/rodape.html"; ?>
