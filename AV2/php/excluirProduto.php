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
    $idProduto = $_GET['idProduto'];
    $ativo = 'DESATIVO';

    echo $tipoProduto;

    $sql = "UPDATE `produto` SET `ativo`='$ativo' WHERE idProduto = '$idProduto'";
    $result = $conn->query($sql);
    
     die();
}
    
?>