<?php
// session_start();
require_once '../config/conexao.php';
require_once 'header.php';
$id_user = '';
if (!empty($_SESSION['usn'])) {
    $id_user = $_SESSION['usn'];
}

$sql = "SELECT * FROM anuncios WHERE id_anuncio = '" . $_GET['idAnuncio'] . "'";
$result = mysqli_query($conn, $sql);
while ($produto = mysqli_fetch_assoc($result)) {
?>
    <link rel="stylesheet" href="/Desapegados/assets/styles/produto.css">

    <body>
        <input type="hidden" name="usuario" id="usuario" value="<?php echo $id_user; ?>">
        <div class="tituloProduto mt-3">
            <h3><?php echo $produto['nome_anuncio']; ?></h3>
        </div>

        <div class="container">

            <div id="imagemCarousel" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/Desapegados/assets/img/produto.png" class="imagem">
                    </div>
                    <div class="carousel-item">
                        <img src="/Desapegados/assets/img/produto2.png" class="imagem">
                    </div>
                    <div class="carousel-item">
                        <img src="/Desapegados/assets/img/produto3.png" class="imagem">
                    </div>
                </div>

                <button class="carousel-control-prev" data-bs-target="#imagemCarousel" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" data-bs-target="#imagemCarousel" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>

            </div>
            <div class="textoProduto">
                <div class="tituloDescricao">
                    <h4>Descrição do produto:</h4>
                </div>
                <div class="descricao">
                    <p><?php echo $produto['descricao']; ?></p>
                    <p>Este produdo foi anúnciado no data  
                        <?php 
                        $datetime = explode(" ", $produto['createDate']);
                        echo date('d/m/Y',  strtotime($datetime[0])); 
                        ?>
                    </p>
                </div>
                <div class="chat">
                    <div class="chatBotao">
                        <img src="/Desapegados/assets/img/chat.svg" alt="chatVendedor">
                        <h6>Chat com Vendendor</h6>
                    </div>
                </div>

                <div class="posiBotao">
                    <button type="submit" class="btn btn-success" name="doacao" id="botao-login" value="1" onclick="aceitarDoacao(this.value)">Aceitar Doação</button>
                </div>

            </div>
        </div>
    <?php
}
    ?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
        function aceitarDoacao(doacao) {
            const idUser = $('#usuario').val();
            if (idUser != "") {
                $.ajax({
                    url: "../config/aceitaDoacao.php",
                    method: "POST",
                    data: {
                        id: <?php echo $_GET['idAnuncio']; ?>,
                        doacao: doacao
                    },
                    success: function(response) {
                        if (response == 1) {
                            Swal.fire(
                                'success',
                                'Sucesso',
                                'Item doado!',
                            )
                        }else if (response == 2) {
                            Swal.fire(
                                'error',
                                'Ocorreu algum problema, tente novamente mais tarde.',
                                '',
                            )
                        }
                    }
                })
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Aviso',
                    text: 'Você precisa estar logado para aceitar uma doação!',
                })
            }
        }
    </script>

    </html>