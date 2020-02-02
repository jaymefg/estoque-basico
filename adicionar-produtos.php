<?php require_once 'autoload.php';
    use classes\Categoria;

    $categorias = Categoria::listar();
?>

<?php require_once "html/cabecalho.html"; ?>

<div id="container-geral">

    <form id="form-add-produto" action="actions/action-adicionar-produtos.php" method="post">
        
        <div id="container-codigos"></div>
        
        <div id="div-input-add">
            <input name='tipo' type="hidden" value="adicionar">
            <input id="descricao" class="elemento-form" name="descricao" type="text" placeholder='Descrição' required>
            <input id="precoCompra" class="elemento-form" name="precoCompra" type="number" step="0.01" placeholder='Preço de Compra' required>
            <input id="precoVenda" class="elemento-form" name="precoVenda" type="number" step="0.01" placeholder='Preco de Venda' required>
            <label for="dataCompra">Data de Compra:</label>
            <input id="dataCompra" class="elemento-form" name="dataCompra" type="date" required>
            <select id="categoria" class="elemento-form" name="categoria">
                <?php foreach($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div id="div-input-codigo" class="elemento-form">
            <input id="codigos" type="text" placeholder="Códido do Produto">
            <button type="button" onclick="adicionarCodigo()">Inserir Código</button>
            <button type="submit">Salvar Produtos</button>
        </div>

    </form>

    <div id="container-tabela-pequena">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Códigos</th>
                </tr>
            </thead>
            <tbody id="lista-codigos">
            </tbody>
        </table>
    </div>

</div>

    <link rel="stylesheet" href="css/adicionar-produto.css">
    <script src="js\adicionar-produto.js"></script>
    <script>
    </script>

<?php require_once "html/rodape.html"; ?>