function getTipo(idSelect){

    var selectTipo = document.getElementById("tipoProduto");
    var length = selectTipo.options.length;
    for (i = length-2; i >= 0; i--) {
    selectTipo.options[i] = null;
    }

    var select = document.getElementById(idSelect);

    var idCategoria = select.options[select.selectedIndex].value;
    console.log(idCategoria);  

    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {
            let obj = JSON.parse(this.responseText);
            console.log("Resposta: " + this.responseText);
            var tipoProduto = document.getElementById("tipoProduto");
            for(var linha=0;linha<obj.length;linha++){
                var opt = document.createElement("option");
                opt.value = obj[linha].idTipo;
                opt.text = obj[linha].nome;
                tipoProduto.add(opt, tipoProduto.options[linha]) 
            }
                
        
        }
    }
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/pegarTipo.php?idCategoria="+ idCategoria, true);
    xmlHttp.send();
    console.log("requisição enviada");
}