<?php
require_once ('conexao.php');

$nome = '';
$email = '';
$celular = '';
$telefone = '';
$cpf = '';
$estado = '';
$rua = '';
$bairro = '';
$numero = '';
$complemento = '';
$senha = '';

if($_POST['senha'] != ''){
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
}

?>