<?php
require_once ("conexao.php");

$senha = '';
$id = '';
if($_POST['senha'] != ""){
    $senha = $_POST['senha'];
}
if($_POST['id'] != ""){
    $id = $_POST['id'];
}

$sql = "SELECT senha FROM usuarios WHERE id_usuario = '" . $id . "'";
$result = mysqli_query($conn, $sql);

while ($verify = mysqli_fetch_assoc($result)){
    if(password_verify($senha, $verify['senha'])){
        echo '1';
    }else{
        echo '2';
    }
}



?>