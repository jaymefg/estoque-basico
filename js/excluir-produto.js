
function mostrarLista(){
    
    var tag = document.querySelectorAll('.lista');
    var formExcluir = document.querySelector('#form-excluir');
    
    if(formExcluir.valor.value == 'p'){
        
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

mostrarLista();