<?php require_once __DIR__ . '/../autoload.php';
    use classes\Categoria;

    $categoria = new Categoria($_POST['c_id']);

    if($categoria->quantidade < 1){
        $categoria->excluir();
        echo "Categoria excluída com sucesso!";
    } else{
        echo "NÃO É POSSÍVEL EXCLUIR A CATEGORIA {$categoria->nome}, POIS ELA POSSUI {$categoria->quantidade} ELEMENTO(S)!";
    }
?>