<?php
// Inclua o arquivo de conexão com o banco de dados
require_once('conexao.php');

// Inicialização de variáveis para evitar avisos
$nome = '';
$email = '';
$celular = '';
$telefone = '';
$estado = '';
$cidade = '';
$cep = '';
$rua = '';
$bairro = '';
$numero = '';
$complemento = '';
$senha = '';
$id_usuario = '';

// Verifica se o campo 'senha' foi enviado via POST e cria um hash da senha
if ($_POST['senha'] != '') {
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
}

// Verifica se os outros campos foram enviados via POST e atribui os valores correspondentes
if ($_POST['nome'] != '') {
    $nome = $_POST['nome'];
}
if ($_POST['email'] != '') {
    $email = $_POST['email'];
}
if ($_POST['celular'] != '') {
    $celular = $_POST['celular'];
}
if ($_POST['telefone'] != '') {
    $telefone = $_POST['telefone'];
}
if ($_POST['estado'] != '') {
    $estado = $_POST['estado'];
}
if ($_POST['cidade'] != '') {
    $cidade = $_POST['cidade'];
}
if ($_POST['cep'] != '') {
    $cep = $_POST['cep'];
}
if ($_POST['rua'] != '') {
    $rua = $_POST['rua'];
}
if ($_POST['bairro'] != '') {
    $bairro = $_POST['bairro'];
}
if ($_POST['numero'] != '') {
    $numero = $_POST['numero'];
}
if ($_POST['complemento'] != '') {
    $complemento = $_POST['complemento'];
}
if ($_POST['id_usuario'] != '') {
    $id_usuario = $_POST['id_usuario'];
}

// Comando SQL UPDATE para atualizar os dados do usuário no banco de dados
if($senha != ''){
    // Se uma nova senha foi fornecida, atualize a senha
    $sqlPassword = "UPDATE usuarios SET senha = '" . $senha . "' WHERE id_usuario = '" . $id_usuario . "'";
    mysqli_query($conn, $sqlPassword);
}

// Comando SQL para atualizar os demais dados do usuário
$sql = "UPDATE usuarios SET
        nome_usuario = '" . $nome . "',
        email = '" . $email . "',
        celular = '" . $celular . "',
        telefone = '" . $telefone . "',
        estado = '" . $estado . "',
        cidade = '" . $cidade . "',
        cep = '" . $cep . "',
        logradouro = '" . $rua . "',
        bairro = '" . $bairro . "',
        num_casa = '" . $numero . "',
        complemento = '" . $complemento . "',
        updateDate = NOW()
        WHERE id_usuario = '" . $id_usuario . "'";

// Executa a consulta SQL
if (mysqli_query($conn, $sql)) {
    header("Location: ../pages/editarPerfil.php?estadoPerfil=1"); // Indica sucesso na atualização
} else {
    header("Location: ../pages/editarPerfil.php?estadoPerfil=6"); // Indica falha na consulta SQL
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
