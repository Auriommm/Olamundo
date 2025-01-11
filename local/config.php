<?php

session_start();

//se eu quiser implementar um timeout manualmente, após 10 segundos
if (isset($_SESSION["homem_morto"]) and time()> ($_SESSION["homem_morto"] + 10)) {
    session_destroy();
    session_start();
}

$_SESSION["homem_morto"]=time();


$ligacao=mysqli_connect("localhost","root","","local");