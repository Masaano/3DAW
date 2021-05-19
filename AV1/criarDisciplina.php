<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "AV1";

    $conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
    if (!$conn) {
        die("Conexão com erro: " . mysqli_connect_error());
    }

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $periodo = $_POST['periodo'];
    $requisito = $_POST['requisito'];
    $credito = $_POST['credito'];
    $verify = true;

    if(!is_numeric($id)){
        $veryfy = false;
    }else if($id<=0){
         $verify = false;
    }

    if(!is_numeric($periodo)){
        $veryfy = false;
    }else if($periodo<=0 || $periodo>5){
        $verify = false;
    }

    if(!is_numeric($requisito)){
        $veryfy = false;
    }else if($requisito<0){
        $verify = false;
    }

    if(!is_numeric($credito)){
        $veryfy = false;
    }else if($credito<=0){
        $verify = false;
    }

    if($verify){
        $sql = "Insert into disciplina(idDisciplina, nome, periodo, idPreRequisito, creditos) VALUES ('$id','$nome','$periodo','$requisito','$credito')";
        $result = $conn->query($sql);
    }else{
        echo"Dado Errado";
    }
    
}

?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Criar Disciplina</title>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <div class="box">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="criarDisciplina.php">Criar Disciplina</a></li>
                        <li><a href="listar.php">Listar Disciplina</a></li>
                        <li><a href="pesquisar.php">Pesquisar Disciplina</a></li>
                        <li><a href="criarUsuario.php">Criar Usuário</a></li>
                        <li><a href="listarUsuario.php">Listar Usuário</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <form action="criarDisciplina.php" method="post">
                <h2>Criar Disciplina</h2>
                <label for="idDisci">Id da Disciplina</label>
                <input type="number" class="input-padrao" name="id" id="idDisci" >

                <label for="nome">Nome</label>
                <input type="text" class="input-padrao" name="nome" id="nome" required> 

                <label for="periodo">Periodo</label>
                <input type="number" class="input-padrao" name="periodo" id="perido" required>

                <label for="idRequisito">Id da disciplina pré-requisitada</label>
                <input type="number" class="input-padrao" name="requisito" id="idRequisito">

                <label for="credito">Créditos</label>
                <input type="number" class="input-padrao" name="credito" id="credito" required>

                <input type="submit" value="Enviar formulário" class="enviar">
            </form>
        </main>

        <footer>
            <p class="copyright">&copy; Copyright Mateus S Martins - 2021</p>
        </footer>
    </body>
</html>