<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "AV2";

    $conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
    if (!$conn) {
        die("Conexão com erro: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM categoria";
    $result = $conn->query($sql);
    $i = 0;
    while ($linha = $result->fetch_assoc()) {
        $resultado[$i]['idCategoria'] = $linha["idCategoria"];
        $resultado[$i]['nome'] = $linha["nome"];
        $i++;
    }

    
     echo json_encode($resultado);
     die()
?>