<?php

    include "config.php";

    if (isset($_POST["email"]) and isset($_POST["password"])) {

        $login= $_POST["email"];
        $password= $_POST["password"];

        //todo: melhorar a segurança

        $sql="SELECT * from user where email like '$login' and password like '$password' ";
        $resposta=mysqli_query($ligacao1,$sql);

        //se a resposta for diferente de false...E....tiver mais do que 0 linhas
        if ($resposta and mysqli_num_rows($resposta)>0 ) {

            //extrair a informação da primeira linha
            $utilizador=mysqli_fetch_array($resposta);
            //preencher o Session com a informação do user
            $_SESSION["user"]=$utilizador["email"];
            $_SESSION["iduser"]=$utilizador["iduser"]; //a chave primária é sempre boa idea ter no session

            header("Location: index.php?error=3");

        } else {

            header("Location: index.php?error=2");

        }
        


    } else {

        header("Location: index.php?error=1");

    }