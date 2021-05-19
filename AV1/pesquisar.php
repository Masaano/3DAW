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
    
    $nome = $_POST['nome'];
    $verify = true;

    $sql = "SELECT * FROM disciplina where nome like '%$nome%' ";
    $result = $conn->query($sql);
}
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
                        <li><a href="pesquisar.php">Pesquisar Disciplina</a></li>
                        <li><a href="criarUsuario.php">Criar Usuário</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <form action="pesquisar.php" method="post" class="pesquisa">
                    <h2>Pesquisar Disciplina</h2>
                    <label for="nome" class="pesquisa-label">Nome</label>
                    <input type="text" class="input-pesquisa" name="nome" id="nome" > 

                    <input type="submit" value="Pesquisar" class="pesquisar">
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Periodo</th>
                            <th>Id do pré-requisito</th>
                            <th>Crédito</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    while ($linha = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $linha["idDisciplina"];?></td>
                    <td><?php echo $linha["nome"];?></td>
                    <td><?php echo $linha["periodo"];?></td>
                    <td><?php echo $linha["idPreRequisito"];?></td>
                    <td><?php echo $linha["creditos"];?></td>
                    <td><a href="editar.php?id=<?php echo $linha["idDisciplina"]; ?>">Editar</a></td>
                    <td><a href="excluir.php?id=<?php echo $linha["idDisciplina"]; ?>">Excluir</a></td>
                </tr>
            <?php
                }
            }
            ?>
                    </tbody>
                </table>
        </main>

        <footer>
            <p class="copyright">&copy; Copyright Barbearia Alura - 2021</p>
        </footer>
    </body>
</html>