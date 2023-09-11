<?php
// session_start();
require_once '../config/conexao.php';


// if ($_SESSION['auth'] == '') {
    // header('Location: cadastro.php');
// }

// $id_produto = '';
// if ($_POST['id_produto'] != '') {
//     $id_produto = $_POST['id_produto'];
// }
?>

<!doctype html>
<html lang="PT-BR">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-XUA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap</title>
        <!-- Icon favorito -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <!-- Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

        <!-- CSS -->
        <link rel="stylesheet" href="/Desapegados/assets/styles/global.css" />
        <link rel="stylesheet" href="/Desapegados/assets/styles/produto.css">

    </head>

  <body>
    
    <div id="navbar">
        <img src="/Desapegados/assets/img/logo.png" alt="Logo navbar" width="50px" height="50px">
    </div>
<?php
$sql = "SELECT * FROM produtos WHERE id_produto = '1'";
$result = mysqli_query($conn, $sql);
while($produto = mysqli_fetch_assoc($result)){
?>
    <div class="tituloProduto">
        <h3><?php echo $produto['nome_produto'];?></h3>
    </div>
    
    <div class="container">

        <div id="imagemCarousel" class="carousel slide"  data-ride="carousel">

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
                    <p><?php echo $produto['descricao'];?></p>
                </div> 
                <div class="chat">
                    <div class="chatBotao">
                        <img src="/Desapegados/assets/img/chat.svg" alt="chatVendedor">
                        <h6>Chat com Vendendor</h6>
                    </div>
                </div>
                
                <div class="posiBotao">
                    <button type="submit" class="btn btn-success" name="doacao" id="botao-login" value="1" onclick="aceitarDoacao()" >Aceitar Doação</button>
                </div>
            
        </div>
    </div>
    <?php
}
?>
  </body>

  <!-- Java Script Bootstrap --> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
  crossorigin="anonymous"></script>
  
    <script>

    function aceitarDoacao() {

        let doacao = document.getElementById("botao-login").value;

        $.ajax({
            url: "",
            method: "POST",
            data: {
                doacao: doacao
            },
            success: function(response){
                
            }
        })
    };

    </script>
  
</html>    

<!--

    Versão GET passando variável pela URL

    function aceitarDoacao() {

        let doacao = document.getElementById("botao-login").value;

        const Url = "http://localhost:8000/Desapegados/pages/aceitaProduto.php?doacao="+doacao;

        const requesicaoDoacao = {
            method: 'GET',
        }
        
            fetch(Url, requesicaoDoacao)
            .then(response => response.json()) // Recebe a resposta como json
            .then(msg => {
                console.log("Resposta do PHP:", msg); // Mostra a resposta no console
            })
            .catch(error => {
                console.log("A requisição HTTP deu erro", error);
            });
    };

-->