<?php require_once 'autoload.php';
    use classes\Conexao;
    use classes\Descricao;
    use classes\Categoria;
    use classes\Produto;

    $selected = "";
    $produto = new Produto($_GET['p_id']);
    $codigo = $produto->codigo;
    $descricao = new Descricao($produto->descricao_id);
    $categoria = new Categoria($produto->categoria_id);
    $categorias = Categoria::listar();
    $produtos = Produto::listarPorDescricao($produto->descricao_id);
?>

<?php require_once "html/cabecalho.html"; ?>

<div id="container-geral">
    
    <div id="div-input-edt">
    
        <form id="form-edt-produto" action="actions/action-editar-produtos.php" method="post">
            
            <input class="elemento-form" type="text" name="codigo" value="<?= $produto->codigo ?>">
            <input class="elemento-form" name="descricao" type="text" value="<?= $descricao->descricao ?>" required>
            <input name="p_id" type="hidden" value="<?= $produto->id ?>">
            <input name="descricao_id" type="hidden" value="<?= $produto->descricao_id ?>">
            <input name="cat_id_anterior" type="hidden" value="<?= $produto->categoria_id ?>">
            <input class="elemento-form" name="precoCompra" type="number" step="0.01" value="<?= $produto->precoCompra ?>" required>
            <input class="elemento-form" name="precoVenda" type="number" step="0.01" value="<?= $produto->precoVenda ?>" required>
            <input type="date" name="dataCompra" class="elemento-form" value="<?= $produto->dataCompra ?>">

            <div id=container-tipo-edicao>
                <p>Tipo de Edição:</p>
                <span><input name="valor" type="radio" value="i" checked> Somente este item</span><br>
                <span><input name="valor" type="radio"  value="m"> Todos iguais a este</span>
            </div>    
            
            <div class="elemento-form">
                <select id="categoria" name="categoria_id">
                    <?php foreach($categorias as $categoria): ?>
                        <?php 
                            if($produto->categoria_id == $categoria['id']){
                                $selected = "selected";
                            }else {
                                $selected = "";
                            }
                        ?>    
                        <option value="<?= $categoria['id'] ?>" <?= $selected ?>><?php echo $categoria['nome'] ?></option>
                    <?php endforeach; ?>
                </select>

                <button id="btn-submit" type="submit">Salvar Edição</button>
            </div>

        </form>

    </div>

    <div id="container-tabela-pequena">
        <table>
            <thead>
                <tr>
                    <th colspan='3'>Itens que serão editados</th>
                </tr>
            </thead>
            <tbody id="lista-codigos">
                <?php foreach($produtos as $produto): ?>
                    <tr class="lista">
                        <td><?= $produto['codigo'] ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td><?= $produto['categoria'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>

<link rel="stylesheet" href="css/editar-produto.css">
<script src="js/editar-produto.js"></script>

<?php require_once "html/rodape.html"; ?>
