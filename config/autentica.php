<?php
// Inicia a sessão ou resume a sessão existente.
session_start();

// Inclui o arquivo de conexão com o banco de dados.
require_once 'conexao.php';

// Inicializa as variáveis $user e $password como strings vazias.
$user = '';
$password = '';

// Verifica se o campo 'email' na solicitação POST não está vazio e atribui seu valor à variável $user.
if ($_POST['email'] != '') {
    $user = $_POST['email'];
}

// Verifica se o campo 'password' na solicitação POST não está vazio e atribui seu valor à variável $password.
if ($_POST['password'] != '') {
    $password = $_POST['password'];
}

// Cria uma consulta SQL para selecionar dados da tabela 'usuarios' onde o campo 'email' corresponde a $user.
$sql = "SELECT id_usuario, email, nome_usuario, senha, status_usuario FROM usuarios WHERE email = '" . $user . "'";

// Executa a consulta SQL no banco de dados.
$result = mysqli_query($conn, $sql);

// Obtém o número de linhas de resultados da consulta.
$row = mysqli_num_rows($result);

// Verifica se a consulta retornou pelo menos uma linha de resultado.
if ($row > 0) {
    // Itera por todas as linhas de resultados.
    while ($dados = mysqli_fetch_assoc($result)) {
        // Verifica se a senha fornecida (em forma de hash) corresponde à senha armazenada no banco de dados.
        if (password_verify($password, $dados['senha'])) {
            // Se a senha corresponder, define as variáveis de sessão 'permissao' como '1' e 'usn' como o ID do usuário.
            $_SESSION['permissao'] = '1';
            $_SESSION['usn'] = $dados['id_usuario'];
            // Retorna '3' (indicando sucesso no login) e encerra o script.
            echo '3';
            exit;
        } else {
            // Se a senha não corresponder, retorna '1' (indicando senha incorreta).
            echo '1';
        }
    }
} else {
    // Se o email não estiver registrado, retorna '2' (indicando email não encontrado).
    echo '2';
}
