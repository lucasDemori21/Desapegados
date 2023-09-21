<?php
require_once '../config/conexao.php';
require_once 'header.php';
$id_user = '';
if (!empty($_SESSION['usn'])) {
    $id_user = $_SESSION['usn'];
}

$sql = "SELECT * FROM anuncios AS a 
INNER JOIN usuarios as us ON (us.id_usuario = a.id_usuario)
WHERE a.id_anuncio = '" . $_GET['idAnuncio'] . "'";
$result = mysqli_query($conn, $sql);
while ($produto = mysqli_fetch_assoc($result)) {
?>
    <link rel="stylesheet" href="/Desapegados/assets/styles/produto.css">

    <body>
        <input type="hidden" name="usuario" id="usuario" value="<?php echo $id_user; ?>">
        <div class="tituloProduto">
            <h3><?php echo $produto['nome_anuncio']; ?></h3>
        </div>

        <div class="container w-100 d-flex">

            <div id="carouselExampleIndicators" class="carousel slide w-50" data-bs-ride="carousel">

                <?php
                if ($produto['nome_img'] != '') {
                    $array_img = explode(",", $produto['nome_img']);

                    echo '<div class="carousel-inner">';
                    for ($i = 0; $i < count($array_img); $i++) {
                        if ($i == 0) {
                            echo '<div class="carousel-item active">';
                        } else {
                            echo '<div class="carousel-item">';
                        }
                        echo '<img src="' . $array_img[$i] . '" class="d-block w-100" alt="..." style="max-width: 100%; max-height: 400px;">';
                        echo '</div>';
                    }
                    echo '</div>';

                    echo '<div class="carousel-indicators">';
                    for ($i = 0; $i < count($array_img); $i++) {
                        if ($i == 0) {
                            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" class="active thumbnail" aria-current="true" aria-label="Slide ' . ($i + 1) . '">';
                        } else {
                            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" class="thumbnail" aria-label="Slide ' . ($i + 1) . '">';
                        }
                        echo '<img src="' . $array_img[$i] . '" class="d-block w-100" alt="..." style="max-width: 50px; max-height: 50px;">';
                        echo '</button>';
                    }
                    echo '</div>';
                } else {
                    echo '<div class="carousel-inner">';
                    echo '<div class="carousel-item active">';
                    echo '<img src="../assets/img/produto_vazio.png" class="d-block w-100" alt="Placeholder">';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="carousel-indicators">';
                    echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active thumbnail" aria-current="true" aria-label="Slide 1">';
                    echo '<img src="../assets/img/produto_vazio.png" class="d-block w-100" alt="Placeholder">';
                    echo '</button>';
                    echo '</div>';
                }
                ?>

            </div>
            <div class="textoProduto">
                <div class="botoesProduto">

                    <div class="tituloDescricao">
                        <h4>Descrição do produto</h4>
                    </div>
                    <div class="descricao">
                        <p><?php echo $produto['descricao']; ?></p>
                    </div>

                    <div class="botoesProduto">
                        <div class="chat">
                            <div class="chatBotao">
                                <img src="/Desapegados/assets/img/chat.svg" alt="chatVendedor">
                                <h6><a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $produto['telefone']; ?>">Entrar em contato</a></h6>
                            </div>
                        </div>

                        <div class="posiBotao">
                            <button type="submit" class="btn btn-success" name="doacao" id="botao-login" value="1" onclick="aceitarDoacao(this.value)">Aceitar Doação</button>
                        </div>
                        <p>Este produdo foi anúnciado dia
                            <?php
                            $datetime = explode(" ", $produto['createDate']);
                            echo date('d/m/Y',  strtotime($datetime[0]));
                            ?>
                        </p>
                    </div>

                </div>
            </div>
        <?php
    }
        ?>
    </body>
    <script src="../assets/js/produto.js"></script>

    </html>