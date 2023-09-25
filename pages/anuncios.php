<?php
require_once '../config/conexao.php';
require_once 'header.php';

$pesquisa = '';

if (!empty($_GET['pesquisar'])) {
    $pesquisa = $_GET['pesquisar'];
}
?>
<link rel="stylesheet" href="../assets/styles/anuncios.css">

<body>
    <section class="d-flex flex-wrap flex-column justify-content-center align-items-center col-12">
        <h1>Anúncios</h1>
        <?php
        $categoria = 0;
        if (!empty($_GET['categoria'])) {
            $categoria = $_GET['categoria'];
        }

        $sql = "SELECT * FROM anuncios WHERE status_anuncio= '1'";
        
        if ($categoria != 0) {
            $sql .= " AND id_categoria = '" . $categoria . "'";
        }

        if ($pesquisa != "") {
            $sql .= " AND nome_anuncio LIKE '%" . $pesquisa . "%'";
        }
        
        $result = mysqli_query($conn, $sql);
        $num_anuncios = mysqli_num_rows($result);

        if ($num_anuncios > 0) {
            while ($anuncio = mysqli_fetch_assoc($result)) {
                $array_img = array();
                $img = '';
                if (($anuncio['nome_img'] != '') || ($anuncio['nome_img'] != null)) {
                    $array_img = explode(",", $anuncio['nome_img']);
                }

                if (!empty($array_img[0])) {
                    $img = $array_img[0];
                } else {
                    $img = "../assets/img/produto_vazio.png";
                }
        ?>
                <div class="product_container mx-3 mt-4 mb-3 px-3 py-3 col-sm-11 col-md-10 col-lg-8">
                    <div class="product_image_container px-3">
                        <img src="<?php echo $img; ?>" alt="Imagem do produto">
                    </div>
                    <div class="product_description_container ml-5 col-sm-7 col-md-7 col-lg-8">
                        <h3><?php echo $anuncio['nome_anuncio']; ?></h3>
                        <p><?php echo $anuncio['descricao']; ?></p>
                        <p><span class="publication_date">Produto anunciado dia
                                <?php
                                $datetime = explode(" ", $anuncio['createDate']);
                                echo date('d/m/Y',  strtotime($datetime[0]));
                                ?>
                            </span></p>
                        <p><a href="produto.php?idAnuncio=<?php echo $anuncio['id_anuncio'] ?>"><button style="width: 200px;" type="submit" class="btn btn-success col-12">Mais detalhes</button></a></p>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<h4>Sem anuncios cadastrados...</h4>';
        }
        ?>
    </section>
</body>

</html>