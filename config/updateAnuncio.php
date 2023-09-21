<?php
require_once("conexao.php");

$id_user = '';
$escolha = '';
$titulo = '';
$descricao = '';
$categoria = '';
$imgs = '';

// Pega os valores dos campos POST
if ($_POST['id_user'] != "") {
    $id_user = $_POST["id_user"];
}
if ($_POST['escolha'] != "") {
    $escolha = $_POST["escolha"];
}
if ($_POST['categoria'] != "") {
    $categoria = $_POST["categoria"];
}
if ($_POST['descricao'] != "") {
    $descricao = $_POST["descricao"];
}
if ($_POST['tituloAnuncio'] != "") {
    $titulo = $_POST["tituloAnuncio"];
}
if ($_POST['id_anuncio'] != "") {
    $id_anuncio = $_POST["id_anuncio"];
}
if ($_POST["img_name"] != "") {
    $imgs = $_POST["img_name"];
}

// Verifica a escolha do usuário
if ($escolha == 1) {
    // Atualiza o status do anúncio para "doado" no banco de dados
    $sql = "UPDATE anuncios 
    SET status_anuncio = '0'
    WHERE id_anuncio = '" . $id_anuncio . "'";

    if (mysqli_query($conn, $sql)) {
        echo '1'; // Indica sucesso na atualização do status
        exit;
    }
} else if ($escolha == 2) {
    // Realiza a atualização dos dados do anúncio, incluindo imagens

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

    // Atualiza os dados do anúncio no banco de dados
    $sql = "UPDATE db_desapegados.anuncios
    SET nome_anuncio = '" . $titulo . "',
        descricao = '" . $descricao . "',
        id_categoria = '" . $categoria . "',
        nome_img = '" . $file_names . "'
        WHERE id_anuncio = '" . $id_anuncio . "'";

    if (mysqli_query($conn, $sql)) {
        // Exclua as imagens antigas se houver atualização de imagens
        if ($imgs != '') {
            $array_img = explode(",", $imgs);
            for ($i = 0; $i < count($array_img); $i++){ 
                $nome_arquivo = $array_img[$i];
                $caminho_arquivo = $nome_arquivo;
                unlink($caminho_arquivo);
            }
        }
        echo '2'; // Indica sucesso na atualização dos dados do anúncio
        exit;
    }
} else if ($escolha == 3) {
    // Realiza a exclusão do anúncio no banco de dados

    $sql = "DELETE FROM anuncios
    WHERE id_anuncio = '" . $id_anuncio . "'";

    if (mysqli_query($conn, $sql)) {
        echo '3'; // Indica sucesso na exclusão do anúncio
        exit;
    }
}
