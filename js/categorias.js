function confirmarExclusao(categoria_id)
{
    var valor = confirm("Tem certeza que deseja excluir esta categoria?");
    if(valor){
        var request = new XMLHttpRequest();
        request.onreadystatechange = function (){
            if(this.status == 200 && this.readyState == 4){                
                alert(this.responseText);
                location.reload(true);
            }
        }
        request.open("POST", "actions/action-excluir-categorias.php", true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send("c_id=" + categoria_id);
    }
}