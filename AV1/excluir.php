<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "AV1";

$conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
if (!$conn) {
    die("Conexão com erro: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "Delete from disciplina where idDisciplina=$id ";
$result = $conn->query($sql);

if($result){
    header("location:listar.php");
    exit;
}else{
    echo "Erro em apagar linha";
}
?>