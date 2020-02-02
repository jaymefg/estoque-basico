<?php require_once 'autoload.php';

use classes\Usuario;

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    header("Location: index.php"); 
    exit;
}

$usuario = Usuario::listarPorNomeSenha($_POST['usuario'], $_POST['senha']);

if (count($usuario) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "Login inválido!"; 
    exit;
}

// Se a sessão não existir, inicia uma
if (!isset($_SESSION)){
    session_start();
} 
    
// Salva os dados encontrados na sessão
$_SESSION['UsuarioID'] = $usuario[0]['id'];
$_SESSION['UsuarioNome'] = $usuario[0]['nome'];
$_SESSION['UsuarioAcesso'] = $usuario[0]['acesso'];

// Redireciona o visitante
header("Location:caixa.php"); 
exit;
?>