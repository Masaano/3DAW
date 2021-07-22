detalheProduto();

function detalheProduto(){

    const urlProduto = new URLSearchParams(window.location.search);
    const codBarra = urlProduto.get('codBarra');
    console.log(codBarra)

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
                
                var tdEditar = novaLinha.insertCell();
                tdEditar.innerHTML = "<a href='editarProduto.html?codBarra="+obj[linha].codBarra+"'>Editar</a>";

                var img = document.createElement("img");
                img.src = "imagens/"+obj[linha].link;
                img.style.width = "30%";
                img.style.height = "30%";
                document.getElementById('imagem').appendChild(img);
                
            }

            
                
        
        }
    }
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/php/detalheProduto.php?codBarra="+codBarra, true);
    xmlHttp.send();
    console.log("requisição enviada");

    
}

