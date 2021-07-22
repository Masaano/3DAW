<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "AV2";

$conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
if (!$conn) {
    die("Conexão com erro: " . mysqli_connect_error());
}

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
    $verify = true;
    $erro = 0;

    if(strlen($codBarra) != 11){
        $verify = false;
        $erro = 1;
    }
    if(empty($nome) == true){
        $verify = false;
        $erro = 2;
    }
    if(empty($fabricante) == true){
        $verify = false;
        $erro = 3;
    }
    if($categoria > 3 || $categoria < 1){
        $verify = false;
        $erro = 4;
    }
    if($categoria == 1){
        if($tipoProduto != 1 && $tipoProduto != 2){
            $verify = false;
            $erro = 6;
        }
    }else if($categoria == 2){
        if($tipoProduto != 3 &&  $tipoProduto != 4){
            $verify = false;
            $erro = 7;
        }
    }else if($categoria == 3){
        if($tipoProduto != 5 &&  $tipoProduto != 6){
            $verify = false;
            $erro = 8;
        }
    }
    if($precoVenda < 1){
        $verify = false;
        $erro = 9;
    }
    if($quantEstoque < 0){
        $verify = false;
        $erro = 10;
    }
    if($pesoGrama < 1){
        $verify = false;
        $erro = 11;
    }
    if(empty($descricao) == true){
        $verify = false;
        $erro = 12;
    }
    if(empty($link) == true){
        $verify = false;
        $erro = 13;
    }
    if($verify){

        $sql = "Insert into produto(idProduto, codigoBarra, nome, fabricante, categoria, tipoProduto, preco, quantidade, peso, descricao, linkImagem, dataInclusao, ativo) VALUES
        (null,'$codBarra','$nome','$fabricante','$categoria','$tipoProduto','$precoVenda','$quantEstoque','$pesoGrama','$descricao','$link','$date','$ativo')";
       $result = $conn->query($sql);

       echo json_encode($result);
    } else {
        echo $erro;

    }
    
}
    
?>