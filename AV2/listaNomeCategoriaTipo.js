
 function categoriaNome(idCat,linhaT){
    
    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
    console.log("ReadyState: " + this.readyState);
    if (this.readyState == 4 && this.status == 200) {
        let obj = JSON.parse(this.responseText);
        console.log("Resposta: " + this.responseText);
        var categoria = "";
        
        for(var linha=0; linha!=idCat ;linha++){
            categoria = obj[linha].nome;
           
        }
        console.log("Id:" + idCat);
        console.log("Categoria:" + categoria);
        
        var tabela = document.getElementById("tCorpo");

        //var nColunas = tabela.rows[0].cells.length;
               

        var cate = tabela.rows[linhaT].cells[2];
        console.log(cate)
        cate.innerHTML = categoria       
            
    }


}


xmlHttp.open("GET", "http://localhost/3DAW/AV2/pegarCategoria.php", true);
xmlHttp.send();
console.log("requisição enviada");


};

function categoriaNomeDetalhes(idCat){
    
    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
    console.log("ReadyState: " + this.readyState);
    if (this.readyState == 4 && this.status == 200) {
        let obj = JSON.parse(this.responseText);
        console.log("Resposta: " + this.responseText);
        var categoria = "";
        
        for(var linha=0; linha!=idCat ;linha++){
            categoria = obj[linha].nome;
           
        }
        console.log("Id:" + idCat);
        console.log("Categoria:" + categoria);
        
        var tabela = document.getElementById("tCorpo");

        //var nColunas = tabela.rows[0].cells.length;
               

        var cate = tabela.rows[0].cells[4];
        console.log(cate)
        cate.innerHTML = categoria       
            
    }


}


xmlHttp.open("GET", "http://localhost/3DAW/AV2/pegarCategoria.php", true);
xmlHttp.send();
console.log("requisição enviada");


};

function tipoNomeDetalhes(idTipo){
    
    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
    console.log("ReadyState: " + this.readyState);
    if (this.readyState == 4 && this.status == 200) {
        let obj = JSON.parse(this.responseText);
        console.log("Resposta: " + this.responseText);
        var tipo = "";
        
        for(var linha=0; linha!=idTipo ;linha++){
            tipo = obj[linha].nome;
           
        }
        console.log("Id:" + idTipo);
        console.log("Tipo:" + tipo);
        
        var tabela = document.getElementById("tCorpo");

        //var nColunas = tabela.rows[0].cells.length;
               

        var tip = tabela.rows[0].cells[5];
        console.log(tip)
        tip.innerHTML = tipo       
            
    }


}


xmlHttp.open("GET", "http://localhost/3DAW/AV2/pegarTipoT.php", true);
xmlHttp.send();
console.log("requisição enviada");


};