<?php
// Inclui o arquivo de conexão com o banco de dados.
require_once 'conexao.php';

// Inicializa as variáveis para armazenar os valores dos campos do formulário.
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

// Verifica se o campo 'nome' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $nome.
if ($_POST['nome'] != '') {
    $nome = $_POST['nome'];
}

// Verifica se o campo 'usuario' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $usuario.
if ($_POST['usuario'] != '') {
    $usuario = $_POST['usuario'];
}

// Verifica se o campo 'email' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $email.
if ($_POST['email'] != '') {
    $email = $_POST['email'];
}

// Verifica se o campo 'tel' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $telefone.
if ($_POST['tel'] != '') {
    $telefone = $_POST['tel'];
}

// Verifica se o campo 'cpf' na solicitação POST não está vazio e, se não estiver vazio, remove pontos e traços e atribui seu valor à variável $cpf.
if ($_POST['cpf'] != '') {
    $cpfF = str_replace('.', "", $_POST['cpf']);
    $cpf = str_replace('-', "", $cpfF);
}

// Verifica se o campo 'id_cep' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $cep.
if ($_POST['id_cep'] != '') {
    $cep = $_POST['id_cep'];
}

// Verifica se o campo 'data_nasc' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $data_nasc.
if ($_POST['data_nasc'] != '') {
    $data_nasc = $_POST['data_nasc'];
}

// Verifica se o campo 'estado' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $estado.
if ($_POST['estado'] != '') {
    $estado = $_POST['estado'];
}

// Verifica se o campo 'cidade' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $cidade.
if ($_POST['cidade'] != '') {
    $cidade = $_POST['cidade'];
}

// Verifica se o campo 'bairro' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $bairro.
if ($_POST['bairro'] != '') {
    $bairro = $_POST['bairro'];
}

// Verifica se o campo 'logradouro' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $logradouro.
if ($_POST['logradouro'] != '') {
    $logradouro = $_POST['logradouro'];
}

// Verifica se o campo 'complemento' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $complemento.
if ($_POST['complemento'] != '') {
    $complemento = $_POST['complemento'];
}

// Verifica se o campo 'num' na solicitação POST não está vazio e, se não estiver vazio, atribui seu valor à variável $numero_casa.
if ($_POST['num'] != '') {
    $numero_casa = $_POST['num'];
}

// Verifica se o campo 'senha' na solicitação POST não está vazio e, se não estiver vazio, gera um hash da senha e atribui seu valor à variável $senha.
if ($_POST['senha'] != '') {
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
}

// Cria uma consulta SQL para verificar se o email já está cadastrado.
$sql_verify = "SELECT email FROM usuarios WHERE email = '" . $email . "'";

// Executa a consulta SQL no banco de dados.
$result = mysqli_query($conn, $sql_verify);

// Obtém o número de linhas de resultados da consulta.
$valid = mysqli_num_rows($result);

// Verifica se o email não está cadastrado no banco de dados.
if ($valid == 0) {
    // Cria uma consulta SQL para inserir os dados do novo usuário na tabela 'usuarios'.
    $query = "INSERT INTO usuarios (nome_usuario, email, telefone, status_usuario, permissao, 
    data_nascimento, senha, cep, estado, cidade, bairro, logradouro, complemento, 
    num_casa, createDate, cpf) VALUES ('$nome', '$email', '$telefone', 0, 0, 
    '$data_nasc', '$senha', '$cep', '$estado', '$cidade', '$bairro', '$logradouro', 
    '$complemento', '$numero_casa', NOW(), '$cpf')";

    // Executa a consulta SQL para inserção dos dados do novo usuário.
    if ($result = mysqli_query($conn, $query)) {
        // Redireciona o usuário para a página de login com um estado de cadastro bem-sucedido.
        header('Location: ../pages/login.php?estadoCadastro=1');
        exit; // Termina o script PHP após o redirecionamento.
    } else {
        // Se ocorrer algum erro durante a inserção no banco de dados, redireciona o usuário para a página de cadastro com um estado de erro.
        header('Location: ../pages/cadastro.php?estadoCadastro=5');
    }
} else {
    // Se o e-mail já estiver cadastrado, redireciona o usuário para a página de cadastro com um estado de e-mail duplicado.
    header('Location: ../pages/cadastro.php?estadoCadastro=6');
}
