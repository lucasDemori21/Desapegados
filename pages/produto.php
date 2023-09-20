<?php
// session_start();
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

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active thumbnail" aria-current="true" aria-label="Slide 1">
                        <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-2.jpg" class="d-block w-100" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="thumbnail" aria-label="Slide 2">
                        <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-1.jpg" class="d-block w-100" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="thumbnail" aria-label="Slide 3">
                        <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-3.jpg" class="d-block w-100" alt="...">
                    </button>
                </div>
            </div>
            <div class="textoProduto">
                <div>

                    <div class="tituloDescricao">
                        <h4>Descrição do produto:</h4>
                    </div>
                    <div class="descricao">
                        <p><?php echo $produto['descricao']; ?>ASKSKAKSDAK KKSASKA SKADSKA KDSAKD SKA DK sdf fwdfwefwfwe SAKD AS</p>
                        <p>Este produdo foi anúnciado no data
                            <?php
                        $datetime = explode(" ", $produto['createDate']);
                        echo date('d/m/Y',  strtotime($datetime[0]));
                        ?>
                    </p>
                </div>
                </div>
                <div class="chat">
                    <div class="chatBotao">
                        <img src="/Desapegados/assets/img/chat.svg" alt="chatVendedor">
                        <h6><a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $produto['telefone']; ?>">Chat com Vendendor</a></h6>
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
                        } else if (response == 2) {
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