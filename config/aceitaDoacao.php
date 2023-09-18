<?php
require_once 'conexao.php';
if (!empty($_POST['doacao'])) {
    $doacao = $_POST['doacao'];
    $id_anuncio = $_POST['id'];
    if ($doacao == '1') {
        $sql = "UPDATE anuncios 
        SET status_anuncio = '" . $doacao . "' 
        WHERE id_anuncio = '" . $id_anuncio . "'";
        if (mysqli_query($conn, $sql)) {
            echo '1';
        } else {
            echo '2';
        }
    }
}