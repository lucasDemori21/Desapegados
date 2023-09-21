<?php
require_once("conexao.php");

$senha = '';
$id = '';

// Recupere os valores dos campos POST
if ($_POST['senha'] != "") {
    $senha = $_POST['senha'];
}
if ($_POST['id'] != "") {
    $id = $_POST['id'];
}

// Consulta o banco de dados para recuperar a senha do usuário com base no ID fornecido
$sql = "SELECT senha FROM usuarios WHERE id_usuario = '" . $id . "'";
$result = mysqli_query($conn, $sql);

while ($verify = mysqli_fetch_assoc($result)){
    // Verifica se a senha fornecida coincide com a senha armazenada no banco de dados
    if(password_verify($senha, $verify['senha'])){
        echo '1'; // Indica que a senha está correta
    }else{
        echo '2'; // Indica que a senha está incorreta
    }
}
