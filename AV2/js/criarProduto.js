function inserirProduto(){
    let objtProduto = document.getElementById("formProduto");
    let msg = validaProduto();
    if(msg == ""){

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

    xmlHttp.open("GET", "http://localhost/3DAW/AV2/php/criarProduto.php?codBarra="+ objtProduto.codBarra.value + "&nome=" + objtProduto.nome.value +
    "&fabricante="+ objtProduto.fabricante.value + "&categoria=" + objtProduto.categoria.value + "&tipoProduto=" + objtProduto.tipoProduto.value + 
    "&precoVenda=" + objtProduto.precoVenda.value + "&quantEstoque=" + objtProduto.quantEstoque.value + "&pesoGrama=" + objtProduto.pesoGrama.value +
    "&descricao=" + objtProduto.descricao.value + "&link=" + objtProduto.link.value, true);
    xmlHttp.send();
    console.log("requisição enviada");
        
    }
    document.getElementById("resposta").innerHTML = msg;
}

function validaProduto(){
    let objtProduto = document.getElementById("formProduto");
    let codBarra = objtProduto.codBarra.value;
    let nome = objtProduto.nome.value;
    let fabricante = objtProduto.fabricante.value;
    let categoria = objtProduto.categoria.value;
    let tipoProduto = objtProduto.tipoProduto.value;
    let precoVenda = objtProduto.precoVenda.value;
    let quantEstoque = objtProduto.quantEstoque.value;
    let pesoGrama = objtProduto.pesoGrama.value;
    let descricao = objtProduto.descricao.value;
    let link = objtProduto.link.value;

    let msg = "";

    if(codBarra.length != 11){
        msg = msg + "Código de Barra Invalido. <br>"
    }

    if(nome === ""){
        msg = msg + "Preencha o campo nome. <br>";
    }

    if(fabricante === ""){
        msg = msg + "Preencha o campo fabricante. <br>";
    }

    if(categoria > 3 || categoria <1){
        msg = msg + "Escolha uma opção válida de categoria. <br>";
    }

    if(!validaTipo(categoria,tipoProduto)){
        msg = msg + "Escolha uma opção válida de tipo. <br>";
    }

    if(precoVenda < 0 || precoVenda === ""){
        msg = msg + "Prencha com um valor positivo o preço. <br>";
    }

    if(quantEstoque < 0 || quantEstoque === ""){
        msg = msg + "Prencha com um valor positivo o estoque. <br>";
    }

    if(pesoGrama < 0 || pesoGrama === ""){
        msg = msg + "Prencha com um valor positivo o peso. <br>";
    }

    if(descricao === ""){
        msg = msg + "Prencha o campo descrição. <br>";
    }

    if(link === ""){
        msg = msg + "Prencha o campo link. <br>";
    }

    alert(msg);
    return msg;

}

function validaTipo(categoria,tipoProduto){
    if(categoria == 1){
        if(tipoProduto == 1 || tipoProduto == 2){
            return true;
        }
        return false;
    }else if(categoria == 2){
        if(tipoProduto == 3 || tipoProduto == 4){
            return true;
        }
        return false;
    }else if(categoria == 3){
        if(tipoProduto == 5 || tipoProduto == 6){
            return true;
        }
        return false;
    }
    return false;
}