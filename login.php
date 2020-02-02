<?php require_once "autoload.php"; ?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css\reset.css">
		<link rel="stylesheet" type="text/css" href="css\principal.css">
		<link rel="icon" href="images\estoque.png">
		<script type="text/javascript" src="js\index.js"></script>
		<title>Sistema de Estoque e Vendas</title>
	</head>
	<body>
		<div id="container-principal">
			
			<header>
				<h1 id="bem-vindo">Sistema de Estoque e Vendas</h1>					
			</header>

			<main id="container-corpo">

                <form id="form-login" action="validacao.php" method="post">
                    <input id="input-usuario" name="usuario" type="text" class="form-login-elementos" placeholder="Usuário">
                    <input type="password" name="senha" id="input-senha" class="form-login-elementos" placeholder="Senha">
                    <button id="btn-submit" type="submit" class="form-login-elementos">Entrar</button>
                </form>
	
	            <link rel="stylesheet" href="css\login.css">
	
<?php require_once "html/rodape.html"; ?>