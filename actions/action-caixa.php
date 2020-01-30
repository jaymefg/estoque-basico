<?php
ini_set('default_character', 'UTF-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once 'autoload.php';

use classes\Produto;
try {
    $produto = Produto::listarPorCodigo($_REQUEST['codigo']);
} catch (\Exception $e) {
    return false;
} catch (\Error $error) {
    return false;
}
?>

<?php if(count($produto) == 1):?>
    
    <tr>
        <?php foreach($produto as $p): ?>
        <td><?= $p['codigo'] ?></td>
        <td><?= $p['descricao'] ?></td>
        <td class="preco-venda"><?= $p['precoVenda'] ?></td>
        <?php endforeach; ?>
    </tr>

<?php endif; ?>
    
    
