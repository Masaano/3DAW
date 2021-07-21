function inserirProduto(){
    let objtProduto = document.getElementById("formProduto");

    let xmlHttp = new XMLHttpRequest();
    console.log("resposta:" + objtProduto.tipoProduto.value);


    xmlHttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {
            console.log("Resposta: " + this.response);
        }
    }

    var select = document.getElementById("tipoProduto");

    var idTipo = select.options[select.selectedIndex].value;
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/criarProduto.php?codBarra="+ objtProduto.codBarra.value + "&nome=" + objtProduto.nome.value +
    "&fabricante="+ objtProduto.fabricante.value + "&categoria=" + objtProduto.categoria.value + "&tipoProduto=" + objtProduto.tipoProduto.value + 
    "&precoVenda=" + objtProduto.precoVenda.value + "&quantEstoque=" + objtProduto.quantEstoque.value + "&pesoGrama=" + objtProduto.pesoGrama.value +
    "&descricao=" + objtProduto.descricao.value + "&link=" + objtProduto.link.value, true);
    xmlHttp.send();
    console.log("requisição enviada");
}
