<?php require_once "sessions/caixa-session.php"; ?>
<?php require_once "html/cabecalho.html"; ?>

<div id="container-geral">

    <div id="container-tabela">
        <table class="tabela-padrao">
            <thead>
                <th>Produto</th>
                <th>Descricao</th>
                <th>Preço</th>
            </thead>
            
            <tbody id='corpo-tabela'></tbody>
        </table>
    </div>

    <form id="form-bar-caixa" method="POST" action="fechar-venda.php">
        <div id='div-add-itens'></div>
        <input id="input-total" type="hidden" name=total value=0>
        <button id="btn-add-cod" type="button" onclick="adicionarCodigo()">+</button>
        <input id="codigo-produto" type="text" autofocus>
        <p id="par-total"><span id="span-total">R$ 0</span></p>
        <button id="btn-fech-compr" type="button" onclick="confirmarFecharVenda()">Fechar Venda</button>
    </form>

</div>

<link rel="stylesheet" href="css\caixa.css">
<script src="js\caixa.js"></script>

<?php require_once "html/rodape.html"; ?>