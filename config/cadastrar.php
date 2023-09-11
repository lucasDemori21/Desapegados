<?php
require_once 'conexao.php';

$nome = '';
$usuario = '';
$email = '';
$telefone = '';
$cpf = '';
$cep = '';
$data_nasc = '';
$estado = '';
$cidade = '';
$bairro = '';
$logradouro = '';
$complemento = '';
$numero_casa = '';
$senha = '';

if($_POST['nome'] != ''){
    $nome = $_POST['nome'];
}
if($_POST['usuario'] != ''){
    $usuario = $_POST['usuario'];
}
if($_POST['email'] != ''){
    $email = $_POST['email'];
}
if($_POST['tel'] != ''){
    $telefone = $_POST['tel'];
}
if($_POST['cpf'] != ''){
    $cpfF = str_replace('.', "", $_POST['cpf']);
    $cpf = str_replace('-', "", $cpfF);
}
if($_POST['id_cep'] != ''){
    $cep = $_POST['id_cep'];
}
if($_POST['data_nasc'] != ''){
    $data_nasc = $_POST['data_nasc'];
}
if($_POST['estado'] != ''){
    $estado = $_POST['estado'];
}
if($_POST['cidade'] != ''){
    $cidade = $_POST['cidade'];
}
if($_POST['bairro'] != ''){
    $bairro = $_POST['bairro'];
}
if($_POST['logradouro'] != ''){
    $logradouro = $_POST['logradouro'];
}
if($_POST['complemento'] != ''){
    $complemento = $_POST['complemento'];
}
if($_POST['num'] != ''){
    $numero_casa = $_POST['num'];
}
if($_POST['senha'] != ''){
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);;
}

$sql_verify = "SELECT email FROM usuarios WHERE email = '" . $email . "'";
$result = mysqli_query($conn, $sql_verify);
$valid = mysqli_num_rows($result);

if ($valid == 0) {
    $query = "INSERT INTO usuarios (nome_usuario, email, telefone, status_usuario, permissao, 
    data_nascimento, senha, estado, cidade, bairro, logradouro, complemento, 
    num_casa, createDate, cpf) VALUES ('$nome', '$email', '$telefone', 0, 0, 
    '$data_nasc', '$senha', '$estado', '$cidade', '$bairro', '$logradouro', 
    '$complemento', '$numero_casa', NOW(), '$cpf')";
    if($result = mysqli_query($conn, $query)){
        header('Location: ../pages/login.php?estadoCadastro=1');
        exit;
    }else{
        header('Location: ../pages/cadastro.php?estadoCadastro=5');
    }
}else{
    header('Location: ../pages/cadastro.php?estadoCadastro=6');
}
