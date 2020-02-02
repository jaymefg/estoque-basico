var tag = document.querySelectorAll('.lista');
var formEditar = document.querySelector('#form-edt-produto');
var codigo = formEditar.codigo.value;
var tagRadio = document.getElementsByName("valor");

mostrarLista();
desabilitarInputs()

tagRadio.forEach(element => {
    element.onclick = function (){
        mostrarLista();
        desabilitarInputs()
    }
});

function mostrarLista()
{
    if(formEditar.valor.value == 'i'){
        
        tag.forEach(element => {
            var conteudo = element.cells.item(0).textContent;

            if(conteudo == codigo){
                element.classList.remove('invisivel');
            } else{
                element.classList.add('invisivel');
            }
        });

    }else{
        tag.forEach(element => {
            element.classList.remove('invisivel');
        });
    }
}

function desabilitarInputs()
{
    if(tagRadio[0].checked){
        formEditar.descricao.disabled = true;
        formEditar.precoCompra.disabled = false;
        formEditar.codigo.disabled = false;
        formEditar.dataCompra.disabled = false;
    }else{
        formEditar.descricao.disabled = false;
        formEditar.precoCompra.disabled = true;
        formEditar.codigo.disabled = true;
        formEditar.dataCompra.disabled = true;
    }
}
