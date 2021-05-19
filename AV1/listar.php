<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "AV1";

    $conn = mysqli_connect($servidor, $usuario, $senha,$nomeBanco);
    if (!$conn) {
        die("Conexão com erro: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM disciplina";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Produtos - Barbearia Alura</title>
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
            <?php
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Id</th><th>Nome</th><th>Periodo</th><th>Id do pré-requisito</th><th>Crédito</th>";
                echo "</tr>";
                echo "</thead>";
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td> " . $linha["idDisciplina"] . "</td>";
                    echo "<br>";
                    echo "<td> " . $linha["nome"] . "</td>";
                    echo "<br>";
                    echo "<td> " . $linha["periodo"] . "</td>";
                    echo "<br>";
                    echo "<td> " . $linha["idPreRequisito"] . "</td>";
                    echo "<br>";
                    echo "<td> " . $linha["creditos"] . "</td>";
                    echo "<br>";
                    echo "<tr>";
                }
                echo "</table>";
            ?>
        </main>

        <footer>
            <p class="copyright">&copy; Copyright Barbearia Alura - 2021</p>
        </footer>
    </body>
</html>