listarTodos();

function escolha(){

    var tabela = document.getElementById("tCorpo");

    var nLinhas = tabela.rows.length;
    for(var i = nLinhas-1; i >= 0; i--){
        tabela.deleteRow(i);
    }
    var codBarra = document.getElementById("cod").value;
    if (codBarra.length  < 11){
        listarTodos();
    }else{
        listaProduto();
    }
}

function listaProduto(){

    var tabela = document.getElementById("tCorpo");

    var nLinhas = tabela.rows.length;
    for(var i = nLinhas-1; i >= 0; i--){
        tabela.deleteRow(i);
    }

    var codBarra = document.getElementById("cod").value;

    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {

            let obj = JSON.parse(this.responseText);
            console.log("Resposta: " + this.responseText);
            var tabela = document.getElementById("tCorpo");

            for(var linha=0;linha<obj.length;linha++){

                var nLinhas = tabela.rows.length;
                var novaLinha = tabela.insertRow(nLinhas);

                var tdCod = novaLinha.insertCell();
                tdCod.innerHTML =  obj[linha].codBarra;
                

                var tdNome = novaLinha.insertCell();
                tdNome.innerHTML ="<a href='detalhesProduto.html?codBarra="+obj[linha].codBarra+"'>"+obj[linha].nome+"</a>" ;

                var tdCat = novaLinha.insertCell(2);
                tdCat.innerHTML = obj[linha].categoria;

                categoriaNome(obj[linha].categoria,linha)

                var tdPreco = novaLinha.insertCell();
                tdPreco.innerHTML = "R$ " + obj[linha].precoVenda;

                var tdEstoque = novaLinha.insertCell();
                tdEstoque.innerHTML = obj[linha].estoque;
                
                var tdEditar = novaLinha.insertCell();
                tdEditar.innerHTML = "<a href='editarProduto.html?codBarra="+obj[linha].codBarra+"'>Editar</a>";

                var tdExcluir = novaLinha.insertCell();
                tdExcluir.innerHTML = "<button onclick='removerProduto(this.tdCod)'>Excluir</button>";

                
            }
                
        
        }
    }
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/listaProduto.php?codBarra="+codBarra, true);
    xmlHttp.send();
    console.log("requisição enviada");
}


function listarTodos(){
    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {

            let obj = JSON.parse(this.responseText);
            console.log("Resposta: " + this.responseText);
            var tabela = document.getElementById("tCorpo");

            for(var linha=0;linha<obj.length;linha++){

                var nLinhas = tabela.rows.length;
                var novaLinha = tabela.insertRow(nLinhas);

                var tdCod = novaLinha.insertCell(0);
                tdCod.innerHTML = obj[linha].codBarra;
                
                var tdNome = novaLinha.insertCell(1);
                tdNome.innerHTML ="<a href='detalhesProduto.html?codBarra="+obj[linha].codBarra+"'>"+obj[linha].nome+"</a>" ;

                var tdCat = novaLinha.insertCell(2);
                tdCat.innerHTML = obj[linha].categoria;

                categoriaNome(obj[linha].categoria,linha)


                var tdPreco = novaLinha.insertCell(3);
                tdPreco.innerHTML = "R$ " + obj[linha].precoVenda;

                var tdEstoque = novaLinha.insertCell(4);
                tdEstoque.innerHTML = obj[linha].estoque;
                
                var tdEditar = novaLinha.insertCell(5);
                tdEditar.innerHTML = "<a href='editarProduto.html?codBarra="+obj[linha].codBarra+"'>Editar</a>";

                var tdExcluir = novaLinha.insertCell(6);
                tdExcluir.innerHTML = "<button onclick='removerProduto(this.tdCod)'>Excluir</button>";

                
            }
                
        
        }
    }
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/listarProdutos.php", true);
    xmlHttp.send();
    console.log("requisição enviada");
}