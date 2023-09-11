<?php
session_start();

require_once 'conexao.php';

$_SESSION['permissao'] = '';
$_SESSION['usn'] = '';

$user = '';
$password = '';

if($_POST['email'] != ''){
    $user = $_POST['email'];
}
if($_POST['password'] != ''){
    $password = $_POST['password'];
}

$sql = "SELECT id_usuario, email, nome_usuario, senha, status_usuario FROM usuarios WHERE email = '" . $user . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);

if($row > 0){
    while($dados = mysqli_fetch_assoc($result)){
        if(password_verify($password, $dados['senha'])){
            $_SESSION['permissao'] = '1';
            $_SESSION['usn'] = $dados['id_usuario'];
            echo '3'; // Sucesso
            exit;
        }else{
            echo '1'; // Email ou senha incorretos
        }
    }
}else{
    echo '2'; // Email não cadastrado
}
?>

<!-- Códigos
    1 - Sucesso
    2 - Email não cadastrado
    3 - Email ou senha incorretos
    4 - Email já cadastrado (cadastro)
    5 - Erro no cadastro (cadastro/cadastro do produto)
    6 - Erro ao editar (editar produto/editar perifl)
    7 - Confirmar decisão-->