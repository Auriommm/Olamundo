<?php

include "config.php";
session_destroy(); //destruir por segurança
header("Location: index.php");