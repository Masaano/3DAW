<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "AV2";

    $conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
    if (!$conn) {
        die("Conexão com erro: " . mysqli_connect_error());
    }

    $cod = $_GET['codBarra'];
    
    $sql = "SELECT * FROM produto WHERE codigoBarra LIKE '$cod'";

    $result = $conn->query($sql);

    $i = 0;
    while ($linha = $result->fetch_assoc()) {

        $resultado[$i]['idProduto'] = $linha["idProduto"];
        $resultado[$i]['codBarra'] = $linha["codigoBarra"];
        $resultado[$i]['nome'] = $linha["nome"];
        $resultado[$i]['fabricante'] = $linha["fabricante"];
        $resultado[$i]['categoria'] = $linha["categoria"];
        $resultado[$i]['tipoProduto'] = $linha["tipoProduto"];
        $resultado[$i]['precoVenda'] = $linha["preco"];
        $resultado[$i]['estoque'] = $linha["quantidade"];
        $resultado[$i]['peso'] = $linha["peso"];
        $resultado[$i]['descricao'] = $linha["descricao"];
        $resultado[$i]['link'] = $linha["linkImagem"];
        $resultado[$i]['data'] = $linha["dataInclusao"];
        $resultado[$i]['ativo'] = $linha["ativo"];


        $i++;
    }

    
     echo json_encode($resultado);
     die();

}
?>