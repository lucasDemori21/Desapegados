<?php 
//DELETE
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

<?php 
//UPDATE
require 'conexao.php';

$resp_product = '';
$id = '';

if($_POST['response'] != '' && $_POST['id'] != ''){
    $resp_product = $_POST['response'];
    $id = $_POST['id'];

    $sql = "UPDATE INTO produtos 
    SET status_produto = '" .$resp_product. "'
    WHERE id_produto = '". $id ."'";

    if(mysqli_query($conn, $sql)){
        echo '1';
    }
}

echo '2';


?>