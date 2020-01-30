function confirmarFecharVenda()
{
    var valor = confirm("Deseja realmente fechar a venda?")
    if (valor) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function (){
            if(this.status == 200 && this.readyState == 4){
                document.getElementById("form-bar-caixa").submit();
            }
        };
        request.open("POST", "fechar-venda.php", true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send();
    }else{

    }
}