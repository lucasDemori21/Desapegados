<?php
// Defina as credenciais do banco de dados
$servername = "127.0.0.1"; // Host do banco de dados (geralmente "localhost" ou "127.0.0.1")
$username = "root"; // Nome de usuário do banco de dados
$password = "root"; // Senha do banco de dados
$database = "db_desapegados"; // Nome do banco de dados a ser usado

// Estabeleça a conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $database);

// Verifique se a conexão foi bem-sucedida
if (!$conn) {
    // Se a conexão falhar, exibe uma mensagem de erro
    echo('Erro na conexão com o banco. ' . mysqli_connect_error());
}
