<?php
ini_set('default_charset','UTF-8');
ini_set("display_errors",1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once "autoload.php";
use classes\Produto;

$produtos = Produto::listar();

?>

<?php require_once "html/cabecalho.html"; ?>

<main>
    <input type="text" class="elemento-add" style="margin: .5%; width: 60%">
    <div id="container-tabela">
        <table class="tabela-padrao">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Adicionar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <div id="corpo-tabela">
            <tbody> 
                <?php foreach($produtos as $produto): ?>
                    <?php $d_id = $produto['descricao_id']; ?>
                    <?php $c_id = $produto['categoria_id']; ?>
                    <?php $pr_vd = $produto['precoVenda']; ?>
                    <?php $p_id = $produto['id']; ?>
                    <tr>
                        <td><?php echo $produto['codigo']; ?></td>
                        <td><?php echo $produto['descricao']; ?></td>
                        <td>R$ <?php echo $produto['precoVenda']; ?></td>
                        <td><?php echo $produto['quantidade'] ?></td>
                        <td><?php echo $produto['categoria']; ?></td>
                        <td><a href="add-produtos.php?desc_id=<?= $d_id; ?>&cat_id=<?= $c_id; ?>&preco=<?= $pr_vd; ?>">+</a></td>
                        <td><a href="editar-produtos.php?desc_id=<?= $d_id; ?>&cat_id=<?= $c_id; ?>&preco=<?= $pr_vd; ?>">Editar</a></td>
                        <td><a href="excluir-produto.php?p_id=<?= $p_id; ?>&d_id=<?= $d_id; ?>&preco=<?= $pr_vd; ?>">Excluir</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            </div>
        </table>
    </div>
    <form action="adicionar-produtos.php">
        <button>Adicionar Novos Produtos</button>
    </form>
</main>

<script src="js\produtos.js"></script>

<?php require_once "html/rodape.html"; ?>