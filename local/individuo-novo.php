<?php 

include "config.php";
if (!isset($_SESSION["id"]) ) {
    header("Location: index.php?erro=acesso inválido");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Novo individuo</h1>
    <p><a href="index.php">cancelar</a></p>
    <form action="individuo-novo-gravar.php" method="post">
        <p>Nome :<input type="text" name="nome"></p>
        <p>Localidade 
            <select name="idlocalidade">
                <?php
    
                
                $linhas=mysqli_query($ligacao, "SELECT * FROM `localidade`  order by localidadecol asc");
                while($linha=mysqli_fetch_array($linhas)) {

                    echo "<option value=\"$linha[idlocalidade]\"
                    
                    
                    >$linha[localidadecol]</option>";

                }
                ?>
                

            </select>
            </p>
        <p><input type="submit"></p>
    </form>
</body>
</html>