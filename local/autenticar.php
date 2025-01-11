<?php

include "config.php";

if (isset($_POST["username"]) and isset($_POST["password"])) {

    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="SELECT * from users where username = '$username' and password = md5('$password') ";
    $dados=mysqli_query($ligacao,$sql);
    $user=mysqli_fetch_array($dados);  //se não existir user o $user fica a false

    if ($user) { //Se é diferente de false é porque há um user

        

        //criar variáveis de sessão
        $_SESSION["nome"] = $user["nome"];
        $_SESSION["id"] = $user["idusers"];
        $_SESSION["username"] = $user["username"];


        header("Location: index.php?sucesso=1");


    } else {

        session_destroy(); //destruir por segurança
        header("Location: index.php?erro=Login inválida");

    }


} else {

    session_destroy(); //destruir por segurança
    header("Location: index.php?erro=Login incompleto");

}