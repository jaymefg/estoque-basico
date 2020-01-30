<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/../css/reset.css">
	<link rel="stylesheet" type="text/css" href="/../css/index.css">
	<link rel="icon" href="/../images/estoque.png">
	<script type="text/javascript" src="/../js/index.js"></script>
	<title>Sistema de Estoque e Vendas</title>
</head>
<body>
	<div id="container-principal">
		<header>
			<h1>Bem-vindo ao sistema de Estoque</h1>
			<nav>
				<form id="container-botoes">
					<button id="caixa" class="botoes" formaction="/../caixa.php">Caixa</button>
					<button id="produtos" class="botoes" formaction="/../produtos.php">Produtos</button>
					<button id="categorias" class="botoes" formaction="/../categorias.php">Categorias</button>
					<button id="relatorios" class="botoes">Relatórios</button>
					<button id="perfis-sistema" class="botoes">Perfis do sistema</button>
					<button id="sair-sistema" class="botoes">Sair do sistema</button>
				</form>
			</nav>
        </header>
        <main>
            <style>
                p{
                    text-align: center;
                    width: 60%;
                    font-weight: bold;
                }
            </style>
            <?php require_once 'autoload.php';
            use classes\Categoria;

            $categoria = new Categoria($_POST['id']);

            if($categoria->quantidade < 1){
                $categoria->excluir();
                header('Location:../categorias.php');
            } else{
                echo "<p>Não é possível excluir a categoria {$categoria->nome}, pois ela está sendo usada por {$categoria->quantidade} elemento(s).</p>";
                echo "<p>Mude a categoria desses elementos para uma diferente para que esta possa ser excluída.</p>";
            }
            ?>
        </main>  
        <footer>

        </footer>
    </div>
</body>
</html>

