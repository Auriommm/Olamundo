<?php
// Inclui o arquivo de configuração para conexão com o banco de dados
include "config.php";

// Verifica se o usuário está autenticado
session_start();
if (!isset($_SESSION["id"])) {
    // Redireciona para a página de login com uma mensagem de erro se o usuário não estiver logado
    header("Location: index.php?erro=acesso inválido");
    exit();
}

// Verifica se o formulário foi enviado e se os dados estão presentes
if (isset($_POST['nome']) && isset($_POST['idlocalidade'])) {
    // Recebe os dados do formulário
    $nome = mysqli_real_escape_string($ligacao, $_POST['nome']);
    $idlocalidade = (int) $_POST['idlocalidade'];

    // Insere os dados na tabela de indivíduos
    $sql = "INSERT INTO individuo (nome, idlocalidade) VALUES ('$nome', '$idlocalidade')";

    // Executa a consulta e verifica se foi bem-sucedida
    if (mysqli_query($ligacao, $sql)) {
        // Redireciona para a página principal com uma mensagem de sucesso
        header("Location: index.php?mensagem=individuo_adicionado");
    } else {
        // Exibe uma mensagem de erro caso a inserção falhe
        echo "Erro ao adicionar indivíduo: " . mysqli_error($ligacao);
    }
} else {
    // Redireciona para a página de criação de indivíduo se os dados não foram enviados corretamente
    header("Location: individuo-novo.php?erro=dados_faltando");
}

// Fecha a conexão com o banco de dados
mysqli_close($ligacao);
?>
