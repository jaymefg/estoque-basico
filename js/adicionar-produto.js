function carregarDadosInputProdutos(idDescricao, idCategoria, descricao, preco)
{
	if (!(idDescricao === null)) {
        var inputDescricao = document.getElementById("descricao");
        var inputCategoria = document.getElementById("categoria");
		var formAdicionarProdutos = document.getElementById('form-add-produto');
		var precoVenda = document.getElementById("precoVenda");
		var inputHidden = document.createElement('input');
		
		precoVenda.value = preco;

        inputDescricao.value = descricao;
        inputDescricao.disabled = true;

        inputCategoria.value = idCategoria;
        
        inputHidden.name = 'descricao_id';
        inputHidden.value = idDescricao;
        inputHidden.type = "hidden";
        
        formAdicionarProdutos.appendChild(inputHidden);
    }
}

function adicionarCodigo() 
{
	var div = document.getElementById("container-codigos");
	var codigo = document.getElementById("codigos");
	var tbody = document.getElementById("lista-codigos");

	var input = document.createElement('input');
	var tdValor = document.createElement('td');
	var tdExcluir = document.createElement('td');
	var tr = document.createElement('tr');
	var a = document.createElement('a');

	tdValor.innerHTML = codigo.value;
	tdExcluir.innerHTML = "<a href=''>Excluir</a>";

	input.value = codigo.value;
	codigo.value = "";

	input.name = "codigosProdutos[]";
	input.type = "hidden";

	tr.appendChild(tdValor);
	tr.appendChild(tdExcluir);
	tbody.appendChild(tr);
	div.appendChild(input);
}