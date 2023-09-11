<?php 
require 'conexao.php';

$resp_product = '';
$id = '';

if($_POST['response'] != '' && $_POST['response'] != ''){
    $resp_product = $_POST['response'];
    $sql = "DELETE FROM produtos
    WHERE id_produto = '". $id ."'";

    if(mysqli_query($conn, $sql)){
        echo '1';
    }
}
echo '2';
?>