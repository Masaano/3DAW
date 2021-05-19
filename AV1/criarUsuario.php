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
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $verify = true;

    if(!is_numeric($id)){
        $veryfy = false;
    }else if($id<=0){
         $verify = false;
    }

    if($tipo=='Professor'){
    }else if($tipo=='Aluno'){
    }else if($tipo=='Coordenador'){
    }else{
        $verify = false;
    }

    if($verify){
        $sql = "Insert into usuario(idUsuario, nome, email, senha, tipo) VALUES ('$id','$nome','$email','$senha','$tipo')";
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
        <title>Criar Usuário</title>
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
                        <li><a href="criarUsuario.php">Criar Usuário</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <form action="criarUsuario.php" method="post">
                <h2>Criar Usuário</h2>
                <label for="idUsuari">Id do Usuario</label>
                <input type="number" class="input-padrao" name="id" id="idUsuari" >

                <label for="nome">Nome</label>
                <input type="text" class="input-padrao" name="nome" id="nome" required> 

                <label for="email">Email</label>
                <input type="email" class="input-padrao" name="email" id="email" required placeholder="seuemail@dominio.com">

                <label for="senha">Senha</label>
                <input type="password" class="input-padrao" name="senha" id="senha" required>

                <fieldset>
                    <legend>Tipo de Usuário</legend>
                    <label for="radio-email"><input type="radio" name="tipo" value="Professor" id="radio-prof">Professor</label>

                    <label for="radio-telefone"><input type="radio" name="tipo" value="Aluno" id="radio-aluno" checked>Aluno</label>

                    <label for="radio-whatsapp"><input type="radio" name="tipo" value="Coordenador" id="radio-coord" >Coordenador</label>
                </fieldset>


                <input type="submit" value="Enviar formulário" class="enviar">
            </form>
        </main>

        <footer>
            <p class="copyright">&copy; Copyright Barbearia Alura - 2021</p>
        </footer>
    </body>
</html>