<?php 
ini_set('display_errors', 0);
session_start();
require_once '../config/conexao.php';        
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/styles/anuncios.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Anúncios</title>
</head>
<body>

    <?php 
        if($_SESSION['usn'] == ''){
            include_once 'header.php'; 
        }else{
            include_once 'headerLogado.php'; 
        } 
    ?>
    <section class="d-flex flex-wrap flex-column justify-content-center align-items-center col-12">
        <h1>Anúncios</h1>
        <?php 
            $categoria = $_GET['categoria'];
            $sql = "SELECT * FROM produtos WHERE status_produto = '1'"; 
            if($categoria != 0){
                $sql .= " AND id_categoria = '" . $categoria . "'";
            }

            $result = mysqli_query($conn, $sql);
            $num_anuncios = mysqli_num_rows($result);

            if($num_anuncios > 0){
                while($anuncio = mysqli_fetch_assoc($result)){


                ?>
                
        <div class="product_container mx-3 mt-4 mb-3 px-3 py-3 col-sm-11 col-md-10 col-lg-8">
            <div class="product_image_container px-3">
                <img src="../assets/img/produto.png" alt="Imagem do produto">
            </div>
            <div class="product_description_container ml-5 col-sm-7 col-md-7 col-lg-8">
                <h3><?php echo $anuncio['nome_produto'];?></h3>
                <p><?php echo $anuncio['descricao'];?></p>
                <p><span class="publication_date"><?php echo $anuncio['createDate'];?></span></p>
            </div>
        </div>
                <?php
                }
            }else{
                echo '<h4>Sem anuncios cadastrados...</h4>';
            }
                ?>
    </section>
</body>
</html>

<script>

</script>