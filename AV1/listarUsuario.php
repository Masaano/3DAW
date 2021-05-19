<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "AV1";

    $conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
    if (!$conn) {
        die("Conexão com erro: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM usuario ";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Listar Usuário</title>
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
            <h2>Listar Usuário</h2>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                while ($linha = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $linha["idUsuario"];?></td>
                <td><?php echo $linha["nome"];?></td>
                <td><?php echo $linha["email"];?></td>
                <td><?php echo $linha["senha"];?></td>
                <td><?php echo $linha["tipo"];?></td>
            </tr>
            <?php
                }
            
            ?>
                </tbody>
            </table>
        </main>

        <footer>
            <p class="copyright">&copy; Copyright Mateus S Martins - 2021</p>
        </footer>
    </body>
</html>