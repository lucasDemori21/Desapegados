<?php
require_once('conexao.php');
$id = '';
$nome_img = '';
$img = '';

if ($_POST['img_profile'] != '') {
    $img = $_POST['img_profile'];
}

if ($_POST['id'] != '') {
    $id = $_POST['id'];
}

if (isset($_FILES['new_img'])) {
    // Diretório onde as imagens serão salvas
    $target_dir = "../assets/img/perfil/";
    $file_name = $_FILES['new_img']['name'];
    $file_tmp = $_FILES['new_img']['tmp_name'];
    // Gera um nome único para cada imagem
    $newfilename = md5($file_name . microtime()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
    // Move o arquivo para o diretório especificado
    move_uploaded_file($file_tmp, $target_dir . $newfilename);
    // Concatena o nome do arquivo na string
    $new_img = $target_dir . $newfilename . ',';
    // Remove a vírgula extra do final da string
    $nome_img = rtrim($new_img, ',');
}

if ($nome_img != '') {
    $sql = "UPDATE usuarios
    SET nome_icon = '" . $nome_img . "'
    WHERE id_usuario = '" . $id . "'";

    if (mysqli_query($conn, $sql)) {
        if($img != ''){
            unlink($img);
        }
        echo '1';
    }
}
