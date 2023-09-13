<?php 
require_once '../config/conexao.php';        
require_once 'header.php';
?>
<link rel="stylesheet" href="../assets/styles/anuncios.css">
<body>
    <section class="d-flex flex-wrap flex-column justify-content-center align-items-center col-12">
        <h1>Meus Anúncios</h1>
        <?php 
            $sql = "SELECT * FROM anuncios WHERE id_usuario = '1'";
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
                            <h3><?php echo $anuncio['nome_anuncio'];?></h3>
                            <p><?php echo $anuncio['descricao'];?></p>
                            <p><span class="publication_date"><?php echo $anuncio['createDate'];?></span></p>
                            <p><a href="#"><button style="width: 200px;" type="submit" class="btn btn-success col-12" value="<?php echo $anuncio['id_anuncio']?>" onclick="idAnuncio(this.value)">Editar Anúncio</button></a></p>
                        </div>
                    </div>

                <?php
                
                }
            }else{
                echo '<h4>Sem anuncios cadastrados...</h4>';
            }
                ?>
    </section>
    <script>

        function idAnuncio(responseId) {
            const idAnuncio = responseId;
            window.location.href = "editarAnuncio.php?id_anuncio=" + idAnuncio;

        }

    </script>
</body>
</html>


