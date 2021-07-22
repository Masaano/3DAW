let xmlHttp = new XMLHttpRequest();

xmlHttp.onreadystatechange = function() {
    console.log("ReadyState: " + this.readyState);
    if (this.readyState == 4 && this.status == 200) {
        let obj = JSON.parse(this.responseText);
        console.log("Resposta: " + this.responseText);
        var categoria = document.getElementById("categoria");
        for(var linha=0;linha<obj.length;linha++){
            var opt = document.createElement("option");
            opt.value = obj[linha].idCategoria;
            opt.text = obj[linha].nome;
            categoria.add(opt, categoria.options[linha]) 
        }
            
    
    }
}
xmlHttp.open("GET", "http://localhost/3DAW/AV2/php/pegarCategoria.php", true);
xmlHttp.send();
console.log("requisição enviada");
