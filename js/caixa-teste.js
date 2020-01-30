
var inputCdg = document.getElementById('codigo-produto');
var divInputs = document.getElementById("div-add-itens");

// Adiciona uma TAG input escondida com o código para depois ser submetido.
function adicionarInputHidden(codigo)
{
    var inputHidden = document.createElement("input");
    inputHidden.name = "codigos[]";
    inputHidden.value = codigo;
    inputHidden.type = "hidden";

    divInputs.appendChild(inputHidden);
}

// adiciona o produto na tabela chamando um action que retornando o produto.
// chama a função adicionarInputHidden.
function adicionarCodigo(e = null)
{
    if(e != null){
        e.preventDefault();
    }

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(request.responseText == false){
                alert("Código não encontrado!");
            } else{
                document.getElementById("corpo-tabela").innerHTML += this.responseText;
                
                adicionarInputHidden(valorCodigo);
            }
        } 
    };

    var valorCodigo = inputCdg.value;

    request.open("POST", "actions/action-caixa.php", true);
    request.setRequestHeader("codigo", "actions/action-caixa.php");
    // request.send("?codigo=" + valorCodigo);
    request.send();

    inputCdg.value = "";
}

inputCdg.onkeydown = function (e){
    if(e.keyCode == 13){
        adicionarCodigo(e);
    }
}
