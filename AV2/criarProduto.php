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
    $date = date('y/m/d');
    $ativo = 'ATIVO';

    echo $tipoProduto;

    $sql = "Insert into produto(idProduto, codigoBarra, nome, fabricante, categoria, tipoProduto, preco, quantidade, peso, descricao, linkImagem, dataInclusao, ativo) VALUES
     (null,'$codBarra','$nome','$fabricante','$categoria','$tipoProduto','$precoVenda','$quantEstoque','$pesoGrama','$descricao','$link','$date','$ativo')";
    $result = $conn->query($sql);
    
     die();
}
    
?>