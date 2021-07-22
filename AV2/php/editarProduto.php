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
    $codBarra = $_GET['codBarra'];
    $nome = $_GET['nome'];
    $fabricante = $_GET['fabricante'];
    $categoria = $_GET['categoria'];
    $tipoProduto = $_GET['tipoProduto'];
    $precoVenda = $_GET['precoVenda'];
    $quantEstoque = $_GET['quantEstoque'];
    $pesoGrama = $_GET['pesoGrama'];
    $descricao = $_GET['descricao'];
    $link = $_GET['link'];
    $date = $_GET['data'];
    $ativo = $_GET['ativo'];

    echo $tipoProduto;

    $sql = "UPDATE `produto` SET `codigoBarra`='$codBarra',`nome`='$nome',`fabricante`='$fabricante',`categoria`='$categoria',`tipoProduto`='$tipoProduto',
    `preco`='$precoVenda',`quantidade`='$quantEstoque',`peso`='$pesoGrama',`descricao`='$descricao',`linkImagem`='$link',`dataInclusao`='$date',
    `ativo`='$ativo' WHERE idProduto = '$idProduto'";
    $result = $conn->query($sql);
    
     die();
}
    
?>