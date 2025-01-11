<?php

$ligacao1=mysqli_connect("localhost","root","", "hotel");

//mudar o charset para o que queremos
mysqli_set_charset($ligacao1,"utf8");

//iniciar ou recuperar sessão
session_start();

//tabelas de erros
$erros=array(
    1=>"Acesso inválido/informação incompleta",
    2=>"Login/pass errada",
    3=>"Autenticação com sucesso",
    4=>"Logout efetuado",
    5=>"Acesso reservado",
    6=>"Erro ao gravar",
    7=>"Registo gravado",
    8=>"Registo desconhecido",
    9=>"Registo eliminado",

);