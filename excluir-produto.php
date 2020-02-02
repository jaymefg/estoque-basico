<?php require_once 'autoload.php';
    use classes\Conexao;
    use classes\Descricao;
    use classes\Produto;

   
    $p = new Produto($_GET['p_id']);
    
    $query = "SELECT p.codigo, d.descricao, p.precoVenda, d.quantidade, c.nome AS catnome FROM produtos p ";
    $query .= "INNER JOIN categorias c ON p.categoria_id = c.id ";
    $query .= "INNER JOIN descricoes d ON p.descricao_id = d.id ";
    $query .= "WHERE p.descricao_id = '{$_GET['d_id']}'";

    // $produtos = Conexao::listar('produtos', $query);
    $produtos = Produto::listarPorDescricao($p->descricao_id);
?>

<?php require_once "html/cabecalho.html"; ?>
    
    <form id="form-excluir" action="actions/action-excluir-produto.php" method="post">
        <div style=" text-align: center; width:20%; vertical-align: middle; margin: 2% auto">
            <input name="p_id" type="hidden" value="<?= $p->id ?>">
            <p>Tipo de Exclusão:</p>
            <span><input name="valor" type="radio" value="p" onclick="mostrarLista()" checked> Somente este item</span><br>
            <span><input name="valor" type="radio"  value="d" onclick="mostrarLista()"> Todos iguais a este</span>
            <button class="elemento-add" type="submit" style="width: 100%">Excluir</button> 
        </div>
    </form>
    
    <div id="container-tabela-pequena">
        <table>
            <thead>
                <tr>
                    <th colspan='3'>Itens que serão excluídos</th>
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

    <script> var codigo = "<?= $p->codigo ?>"; </script>
    <script src="js\excluir-produto.js"></script>

<?php require_once "html/rodape.html"; ?>
