function excluir(){
    var tabela = document.getElementById("tCorpo");
    console.log("Tabela:" + tabela);
     var idT = tabela.rows[0].cells[0];
    console.log(idT)
    var id = idT.innerHTML
    console.log(id);

    var catT = tabela.rows[0].cells[1];
    var cat = catT.innerHTML


    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {
            console.log("Resposta: " + this.response);

            setTimeout(function() {
                window.location.href = "detalhesProduto.html?codBarra="+cat+"";
            }, 500);
        }
    }


    xmlHttp.open("GET", "http://localhost/3DAW/AV2/php/excluirProduto.php?idProduto="+ id , true);
    xmlHttp.send();
    console.log("requisição enviada");

}

function escolhe(codBarra){
    if(document.getElementById("tab") == null){
        excluirDetalheProduto(codBarra);
    }else{
        apagar();
        excluirDetalheProduto(codBarra);
    }
    
}

function apagar(){

    
    var tabExcluir = document.getElementById("tab");
    var butExcluir = document.getElementById("botao");

    tabExcluir.parentNode.removeChild(tabExcluir);
    butExcluir.parentNode.removeChild(butExcluir);
    
    
}


function excluirDetalheProduto(codBarra){

    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {

            let obj = JSON.parse(this.responseText);
            console.log("Resposta: " + this.responseText);

            var tabelaGeral = document.createElement("table");
            tabelaGeral.setAttribute("id","tab")
            var cabeca = document.createElement("thead");
            var lCabeca = document.createElement("tr");

            
            var thId = lCabeca.insertCell();
            thId.innerHTML = "Id do Produto";

            var thCod = lCabeca.insertCell();
            thCod.innerHTML = "Código de Barra";

            var thNome = lCabeca.insertCell();
            thNome.innerHTML = "Nome";

            var thFabricante = lCabeca.insertCell();
            thFabricante.innerHTML = "Fabricante";

            var thCategoria = lCabeca.insertCell();
            thCategoria.innerHTML = "Categoria";

            var thTipo = lCabeca.insertCell();
            thTipo.innerHTML = "Tipo de Produto";

            var thPreco = lCabeca.insertCell();
            thPreco.innerHTML = "Preço de Venda";

            var thEstoque = lCabeca.insertCell();
            thEstoque.innerHTML = "Estoque";

            var thPeso = lCabeca.insertCell();
            thPeso.innerHTML = "Peso em Gramas";

            var thDescricao = lCabeca.insertCell();
            thDescricao.innerHTML = "Descrição";

            var thLink = lCabeca.insertCell();
            thLink.innerHTML = "Link da Imagem";

            var thData = lCabeca.insertCell();
            thData.innerHTML = "Data da Inclusão";

            var thAtivo = lCabeca.insertCell();
            thAtivo.innerHTML = "ATIVO";

            cabeca.appendChild(lCabeca);
            tabelaGeral.appendChild(cabeca);

            var tabela = document.createElement("tbody");
            tabela.setAttribute("id","tCorpo")
            
            document.getElementsByTagName("body")[0].appendChild(tabelaGeral)
           for(var linha=0;linha<obj.length;linha++){

                var novaLinha = tabela.insertRow(0);

                var tdId = novaLinha.insertCell();
                tdId.innerHTML = obj[linha].idProduto;

                var tdCod = novaLinha.insertCell();
                tdCod.innerHTML = obj[linha].codBarra;
                
                var tdNome = novaLinha.insertCell();
                tdNome.innerHTML = obj[linha].nome;

                var tdFabricante = novaLinha.insertCell();
                tdFabricante.innerHTML = obj[linha].fabricante;

                var tdCat = novaLinha.insertCell();
                tdCat.innerHTML = obj[linha].categoria;

                categoriaNomeDetalhes(obj[linha].categoria);

                var tdTipo = novaLinha.insertCell();
                tdTipo.innerHTML = obj[linha].tipoProduto;

                tipoNomeDetalhes(obj[linha].tipoProduto);

                var tdPreco = novaLinha.insertCell();
                tdPreco.innerHTML = "R$ " + obj[linha].precoVenda;

                var tdEstoque = novaLinha.insertCell();
                tdEstoque.innerHTML = obj[linha].estoque;

                var tdPeso = novaLinha.insertCell();
                tdPeso.innerHTML = obj[linha].peso;

                var tdDescricao = novaLinha.insertCell();
                tdDescricao.innerHTML = obj[linha].descricao;

                var tdLink = novaLinha.insertCell();
                tdLink.innerHTML = obj[linha].link;

                var tdData = novaLinha.insertCell();
                tdData.innerHTML = obj[linha].data;

                var tdAtivo = novaLinha.insertCell();
                tdAtivo.innerHTML = obj[linha].ativo;

                var tdExcluir = document.createElement("input");
                tdExcluir.setAttribute("id","botao");
                tdExcluir.setAttribute("type","button");
                tdExcluir.setAttribute("value","Confirmar Exclusão");
                tdExcluir.setAttribute("class","enviar");
                tdExcluir.setAttribute("onclick","excluir()");

                document.getElementsByTagName("body")[0].appendChild(tdExcluir);
            }

            tabelaGeral.appendChild(tabela);   
        
        }
    }
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/php/detalheProduto.php?codBarra="+codBarra, true);
    xmlHttp.send();
    console.log("requisição enviada");

    
}