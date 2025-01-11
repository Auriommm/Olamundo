<?php include "config.php"; 
if (!isset($_SESSION["user"])) {
    header("Location: index.php?error=5");
    exit();
}

?>
<!DOCTYPE html>
<html lang="PT_pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include "header.php"; ?>
    <main>
       <h2>Gestão de Quartos</h2>
       <p><a href="add_quarto.php" class="botao">Adicionar animal de estimação</a></p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Numero de identificacao</th>
                    <th>Email</th>
                    <th>Contacto</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql="SELECT * from reserva
                    where reserva.idquarto=quarto.idquarto
                    and reserva.idcliente = $_SESSION[idcliente]
                    order by nomecliente asc";
                    $linhas=mysqli_query($ligacao1, $sql);
                    while($linha=mysqli_fetch_array($linhas)) {

                        echo "                
                        <tr>
                            <td>$linha[idreserval]</td>
                            <td>$linha[nome]</td>
                            <td><img class=badge src='$linha[foto]'></td>
                            <td>$linha[raca]</td>
                            <td>
                            <a class=botao href='animais_editar.php?idanimal=$linha[idanimal]'>Editar</a>
                            <a class=botao href='animais_eliminar.php?idanimal=$linha[idanimal]'>Eliminar</a>
                            
                            </td>
                        </tr>";


                    }
                
                ?>

            </tbody>
        </table>
    </main>
    <footer>
        <p>Copyright IPT</p>
    </footer>
    <?php 

        if (isset($_GET["error"]) and isset($erros[ $_GET["error"] ])) {

                echo "<script>alert('".$erros[ $_GET["error"] ]."');</script>";


        }
    
    ?>
</body>
</html>