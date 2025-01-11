<?php

    include "config.php";

    if (!isset($_SESSION["cliente"])) {
        header("Location: index.php?error=5");
        exit();
    }    


    if (isset($_POST["nomecliente"]) and isset($_POST["numidentificacao"]) and  !empty($_POST["email"]) and !empty($_POST["contacto"])) {

        $iduser=$_SESSION["iduser"];
        $nome=$_POST["nomecliente"];
        $bi=$_POST["numidentificacao"];
        


        $sql="INSERT into animal (nome, idraca, foto, iduser) 
                VALUES ('$nome', '$raca', '$foto', '$iduser')";

        $ok=mysqli_query($ligacao1,$sql);

        if ($ok) {

            //por vezes é necessário saber qual a chave primária que foi gerada automáticamente
            $idanimal=mysqli_insert_id($ligacao1); //retorna a ultima chave primária criada

            header("Location: animais.php?error=7");

        } else {

            header("Location: animais_adicionar.php?error=6");

        }


    } else {

        header("Location: animais_adicionar.php?error=1");

    }
