<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "AV1";
    

    $conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
    if (!$conn) {
        die("Conexão com erro: " . mysqli_connect_error());
    }   

    $file=$_POST['url'];
    $verify = true;
    
    $content = fopen($file, "r");
    if ($content) {
        $total = 0;
        $collection = array();
        while (($line = fgets($content)) !== false) {
    
            $data = explode("|",$line);
            $collection[$total] = array(
                        'idUsuario' => $data[0],
                        'nome'        => $data[1],
                        'email'        => $data[2],
                        'senha'      => $data[3],
                        'tipo'   => $data[4],
                        );
                if($total!=0){
                    if(!is_numeric($data[0])){
                        $veryfy = false;
                    }else if($data[0]<=0){
                            $verify = false;
                    }

                    if(!isset($data[1])){
                        $verify = false;
                    }

                    if(!isset($data[2])){
                        $verify = false;
                    }

                    if(!isset($data[3])){
                        $verify = false;
                    }
                    if(!isset($data[4])){
                        $verify = false;
                    }

                    if($verify){
                        $sql = "Insert into usuario(idUsuario, nome, email, senha, tipo) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
                        $result = $conn->query($sql);
                    }else{
                        echo"Dado Errado";
                    }
                }
                    
            $total++;       
        }
           
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
                        <li><a href="pesquisar.php">Pesquisar Disciplina</a></li>
                        <li><a href="criarUsuario.php">Criar Usuário</a></li>
                        <li><a href="listarUsuario.php">Listar Usuário</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <form action="criarUsuario.php" method="post">
                <h2>Criar Usuário</h2>
                <label for="urlUsuar">Url do Arquivo</label>
                <input type="text" class="input-padrao" name="url" id="urlUsuar" required>

                <input type="submit" value="Enviar formulário" class="enviar">
            </form>
        </main>

        <footer>
            <p class="copyright">&copy; Copyright Mateus S Martins - 2021</p>
        </footer>
    </body>
</html>