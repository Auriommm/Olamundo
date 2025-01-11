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
    <h1>Editar individuo</h1>
    <?php 
 
  
            $individuos=mysqli_query($ligacao, "SELECT * FROM `individuo` 
            where idindividuo=". $_GET["idindividuo"] );
            $ind=mysqli_fetch_array($individuos);    
    ?>
    <p><a href="index.php">cancelar</a></p>
    <form action="individuo-editar-gravar.php" method="post">
        <p>Nome :<input type="text" name="nome" value="<?php echo $ind["nome"]; ?>"></p>
        <p>Localidade <?php echo $ind["idlocalidade"]; ?>
            <select name="idlocalidade">
                <?php
                $linhas=mysqli_query($ligacao, "SELECT * FROM `localidade`  order by localidadecol asc");
                while($linha=mysqli_fetch_array($linhas)) {

                    echo "<option value=\"$linha[idlocalidade]\" ";
                    //quando a chave primária for igual à chave estrangeira
                    if ($linha["idlocalidade"]==$ind["idlocalidade"]) {
                        echo " selected";
                    }
                    echo ">$linha[localidadecol]</option>";

                }
                ?>
                

            </select>
            </p>
        <p><input type="submit"></p>
    </form>
</body>
</html>