<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="PT_pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra-te aqui</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h2>Novo registo</h2>
        <?php
            if (isset($_SESSION["user"])) {

                ?>
                <p>User: <?php echo $_SESSION["user"]; ?></p>
                <p><a href="logout.php" class="botao">logout</a></p>

                <?php

            } else {
                    ?>
                    <p><a href="index.php" class="botao">Voltar/Cancelar</a></p>
                    <form action="registo_gravar.php" method="post">
                        <p><input type="username" name="username" placeholder="Digite o seu nome" required></p>
                        <p><input type="email" placeholder="login/email" name="login" required></p>
                        <p><input type="password" name="password" placeholder="palavra passe" required></p>
                        <p><input type="submit"></p>
                    </form>

                    <?php 
            }
        ?>
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