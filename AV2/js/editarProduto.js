pegarProduto();

function pegarProduto(){

    const urlProduto = new URLSearchParams(window.location.search);
    const codBarra = urlProduto.get('codBarra');
    console.log(codBarra)


    let xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {

            let obj = JSON.parse(this.responseText);
            console.log("Resposta: " + this.responseText);

            document.getElementById("idProduto").innerHTML = obj[0].idProduto;

            document.getElementById("codBarra").value = obj[0].codBarra;
            
            document.getElementById("nome").value = obj[0].nome;

            document.getElementById("fabricante").value = obj[0].fabricante;

            document.getElementById("categoria").value = obj[0].categoria;

            document.getElementById("tipoProduto").value = obj[0].tipoProduto;
            tipoNomeEdita(obj[0].tipoProduto);

            document.getElementById("precoVenda").value = obj[0].precoVenda;

            document.getElementById("quantEstoque").value = obj[0].estoque;

            document.getElementById("pesoGrama").value = obj[0].peso;

            document.getElementById("descricao").value = obj[0].descricao;

            document.getElementById("link").value = obj[0].link;

            document.getElementById("data").value = obj[0].data;

            document.getElementById("ativo").value  = obj[0].ativo;               
                            
        
        }
    }
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/php/detalheProduto.php?codBarra="+codBarra, true);
    xmlHttp.send();
    console.log("requisição enviada");

    
}


function atualizarProduto(){
    let objtProduto = document.getElementById("formProduto");
    let id = document.getElementById("idProduto").innerHTML

    let xmlHttp = new XMLHttpRequest();
    console.log("resposta:" + objtProduto.tipoProduto.value);


    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {
            console.log("Resposta: " + this.response);

            setTimeout(function() {
                window.location.href = "detalhesProduto.html?codBarra="+objtProduto.codBarra.value+"";
            }, 500);
        }
    }

    var select = document.getElementById("tipoProduto");

    var idTipo = select.options[select.selectedIndex].value;
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/php/editarProduto.php?idProduto="+ id +"&codBarra="+ objtProduto.codBarra.value + 
    "&nome=" + objtProduto.nome.value + "&fabricante="+ objtProduto.fabricante.value + "&categoria=" + objtProduto.categoria.value + 
    "&tipoProduto=" + objtProduto.tipoProduto.value + "&precoVenda=" + objtProduto.precoVenda.value + "&quantEstoque=" + objtProduto.quantEstoque.value + 
    "&pesoGrama=" + objtProduto.pesoGrama.value + "&descricao=" + objtProduto.descricao.value + "&link=" + objtProduto.link.value + 
    "&data=" +objtProduto.data.value + "&ativo=" + objtProduto.ativo.value, true);
    xmlHttp.send();
    console.log("requisição enviada");
}