<?php 
 include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indivíduos</title>
</head>
<body>
    <h1>Individuos</h1>
    <p><a href="individuo-novo.php">Adicionar individuo</a></p>
    <?php
    
   

    $linhas=mysqli_query($ligacao, "SELECT * FROM alunos JOIN professor ON alunos.professor_idprofessor = professor.idprofessor;
;");
    
    ?>
    <table bordeR=1>
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>localidade</th>
            <th>opção</th>
        </tr>
        <?php 
            while($linha=mysqli_fetch_array($linhas)) {



                echo "
                <tr>
                    <td>$linha[idindividuo]</td>
                    <td>$linha[nome]</td>
                    <td>$linha[localidadecol]</td>
                    <td><a href=\"individuo-editar.php?idindividuo=$linha[idindividuo]\">Editar</a></td>
                </tr>";

            }
        ?>
    </table>

    <?php 
    
    if (!isset($_SESSION["id"]) ) {
    
    ?>

    <h2>Login</h2>
    <form method="post" action="autenticar.php">
        <p><label for="username">Utilizador</label><input type="text" name="username"></p>
        <p><label for="password">Password</label><input type="password" name="password"></p>
        <input type=submit>
    </form>

    <?php } else { ?>

        <p>Username: <?php echo $_SESSION["nome"]; ?> <a href="sair.php">Sair</a></p>


   <?php } ?>


</body>
</html>