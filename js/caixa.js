
var inputCdg = document.getElementById('codigo-produto');
inputCdg.onkeydown = function (e){
    var enter = 13;
    if(e.keyCode == enter){
        adicionarCodigo(e);
    }
}

var divInputs = document.getElementById("div-add-itens");

// Adiciona uma TAG input escondida com o código para depois ser submetido.
function adicionarInputHidden(codigo)
{
    var inputHidden = document.createElement("input");
    inputHidden.name = "codigos[]";
    inputHidden.value = codigo;
    inputHidden.type = "hidden";

    divInputs.appendChild(inputHidden);

    somarTotal();
}

// faz um request solicitando o produto adicionando-o na tabela, escrevendo direto no texto HTML.
// chama a função adicionarInputHidden.
function adicionarCodigo(e = null)
{
    if(e != null){
        e.preventDefault();
    }

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(request.response == false){
                alert("Código não encontrado!");
            } else{
                document.getElementById("corpo-tabela").innerHTML += this.responseText;
                
                adicionarInputHidden(valorCodigo);
            }
        } 
    };

    var valorCodigo = inputCdg.value;

    request.open("POST", "actions/action-caixa.php");
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send("codigo=" + inputCdg.value);

    inputCdg.value = "";
}

function confirmarFecharVenda()
{
    var input = document.getElementById("input-total");
    if(input.value != 0){
        var valor = confirm("Deseja realmente fechar a venda?")
        if (valor) {
            document.getElementById("form-bar-caixa").submit();
        }
    }else{
        alert("POR FAVOR, INSIRA ELEMENTOS NA LISTA!");
    }
}

function somarTotal()
{
    var total = 0;

    var td = document.getElementsByClassName('preco-venda');
    for(i = 0; i < td.length; i++){
        total += parseFloat(td[i].textContent);
    }

    var input = document.getElementById("input-total");
    input.value = total;
    
    var span = document.getElementById("span-total"); 
    span.textContent = "R$ " + input.value;
}
