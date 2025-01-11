<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="PT_pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de hotel</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <?php
            if (isset($_SESSION["user"])) {

                ?>
                <p>User: <?php echo $_SESSION["username"]; ?></p>
                <p><a href="logout.php" class="botao">logout</a></p>

                <?php

            } else {
        ?>
        <form action="login.php" method="post">
            <p><input type="email" placeholder="email" name="email"></p>
            <p><input type="password" name="password" placeholder="palavra passe"></p>
            <p><input type="submit"></p>
        </form>
        <p>Ainda não registou-se? <a href="registo.php" class="botao">Registe-se</a></p>
        <?php 
            }
        ?>
    </main>
    <?php 

        if (isset($_GET["error"]) and isset($erros[ $_GET["error"] ])) {

                echo "<script>alert('".$erros[ $_GET["error"] ]."');</script>";


        }
    
    ?>
</body>
</html>