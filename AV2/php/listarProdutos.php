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
    
    $sql = "SELECT `codigoBarra`, `nome`, `categoria`, `preco`, `quantidade` FROM `produto`";

    $result = $conn->query($sql);
    $i = 0;
    while ($linha = $result->fetch_assoc()) {
        
        $resultado[$i]['codBarra'] = $linha["codigoBarra"];
        $resultado[$i]['nome'] = $linha["nome"];
        $resultado[$i]['categoria'] = $linha["categoria"];
        $resultado[$i]['precoVenda'] = $linha["preco"];
        $resultado[$i]['estoque'] = $linha["quantidade"];

        $i++;
    }

    
     echo json_encode($resultado);
     die();

}
?>