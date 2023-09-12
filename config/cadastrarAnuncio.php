<?php
require_once ("conexao.php");

$titulo = '';
$categoria = '';
$descricao = '';
$files = '';
$id_usuario = '';

if ($_POST['tituloAnuncio'] != '') {
    $titulo = $_POST['tituloAnuncio'];
}
if ($_POST['categoria'] != '') {
    $categoria = $_POST['categoria'];
}
if ($_POST['descricao'] != '') {
    $descricao = $_POST['descricao'];
}
if ($_POST['id_usuario'] != '') {
    $id_usuario = $_POST['id_usuario'];
}

// Inicializa a variável para armazenar os nomes de arquivo
$file_names = '';

if (isset($_FILES['fileUpload'])) {
    // Diretório onde as imagens serão salvas
    $target_dir = "../assets/img/anuncios/";
    // Loop através dos arquivos enviados
    foreach ($_FILES['fileUpload']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['fileUpload']['name'][$key];
        $file_size = $_FILES['fileUpload']['size'][$key];
        $file_tmp = $_FILES['fileUpload']['tmp_name'][$key];
        $file_type = $_FILES['fileUpload']['type'][$key];
        // Gera um nome único para cada imagem
        $newfilename = md5($file_name . microtime()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
        // Move o arquivo para o diretório especificado
        move_uploaded_file($file_tmp, $target_dir . $newfilename);
        // Concatena o nome do arquivo na string
        $file_names .= $target_dir . $newfilename . ',';
    }
    // Remove a vírgula extra do final da string
    $file_names = rtrim($file_names, ',');
}
$sql = "INSERT INTO anuncios (id_usuario, id_categoria, nome_img, nome_anuncio, descricao, createDate)
    VALUES ('" . $id_usuario . "', '" . $categoria . "', '" . $file_names . "', '" . $titulo . "',
     '" . $descricao . "', '" . date('Y-m-d H:i:s') . "')";
if (mysqli_query($conn, $sql)) {
    header("Location: ../pages/cadastroAnuncio.php?estadoCadastro=1");
} else {
    header("Location: ../pages/cadastroAnuncio.php?estadoCadastro=5");
}
