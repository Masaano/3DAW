<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "AV1";

    $conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
    if (!$conn) {
        die("Conexão com erro: " . mysqli_connect_error());
    }

    $idE = $_GET['id'];

    $sql = "SELECT * FROM disciplina where idDisciplina= $idE";
    $result = $conn->query($sql);
    $data = mysqli_fetch_array($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        $sql = "UPDATE disciplina SET idDisciplina='$id', nome='$nome', periodo='$periodo',idPreRequisito='$requisito',creditos='$credito' WHERE idDisciplina=$idE ";
        $result = $conn->query($sql);
        header("location:listar.php");
        exit;
    }else{
        echo"Dado Errado";
    }
}

?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Editar Discuplina</title>
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
            <form action="editar.php?id=<?php echo $idE;?>" method="post">
                <h2>Editar Discuplina</h2>
                <label for="idDisci">Id da Disciplina</label>
                <input type="number" class="input-padrao" name="id" value="<?php echo $data['idDisciplina'] ?>" id="idDisci" required>

                <label for="nome">Nome</label>
                <input type="text" class="input-padrao" name="nome" value="<?php echo $data['nome'] ?>" id="nome" required> 

                <label for="periodo">Periodo</label>
                <input type="number" class="input-padrao" name="periodo" value="<?php echo $data['periodo'] ?>" id="perido" required>

                <label for="idRequisito">Id da disciplina pré-requisitada</label>
                <input type="number" class="input-padrao" name="requisito" value="<?php echo $data['idPreRequisito'] ?>" id="idRequisito">

                <label for="credito">Créditos</label>
                <input type="number" class="input-padrao" name="credito" value="<?php echo $data['creditos'] ?>" id="credito" required>

                <input type="submit" value="Alterar" class="update">
            </form>
        </main>

        <footer>
            <p class="copyright">&copy; Copyright Mateus S Martins - 2021</p>
        </footer>
    </body>
</html>