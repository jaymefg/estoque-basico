<?php
    
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)){
    session_start();
}
    
$acesso = 1; // Nível de acesso do caixa. Para as outras páginas é 2.

// Verifica se não há a variável da sessão que identifica o usuário
if (!(isset($_SESSION['UsuarioID']) OR $_SESSION['UsuarioAcesso'] >= $acesso)) {
    // Destrói a sessão por segurança, mesmo que não tenha sido iniciado uma.
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}
    
?>