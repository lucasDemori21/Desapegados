<?php
require '../config/conexao.php';
$nome_produto = '';
$categoria = '';
$descricao_produto = '';
$vendedor_produto ='';

$id = 0;
if($_GET['id'] != ''){
    $id = $_GET['id'];
}
$sql = "SELECT * FROM produtos WHERE id_produto = '" . $id . "'";

$result = mysqli_query($conn, $sql);
while($dados = mysqli_fetch_assoc($result)){

    $nome_produto = $dados['nome_produto'];
    $descricao_produto = $dados['descricao'];
    $vendedor_produto = $dados['descricao'];

}

?>

<!doctype html>
<html lang="PT-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-XUA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Editar produto</title>
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
        <link rel="stylesheet" href="../assets/styles/global.css">
        <link rel="stylesheet" href="../assets/styles/editarProduto.css">
    </head>
  <body>
    <?php include_once('./header.php')?>
<form action="../config/salva_alteracoes.php" method="post">
    <div class="tituloProduto">
        <div class="col-sm-4">
            <input class="form-control form-control-lg" type="text" 
            placeholder="Título do Anúncio..." id="tituloProduto" name="tituloProduto" 
            value="<?php if($nome_produto != ''){echo $nome_produto;}else{echo '';}?>">
        </div>
        <div class="col-sm-2">
            <select class="form-select" value="<?php echo $categoria;?>" name="categoria">
            <option value="0">Todas</option>
                <option value="1">Pets</option>
                <option value="2">Literatura</option>
                <option value="3">Roupas</option>
                <option value="4">Alimentos</option>
                <option value="5">Eletrônicos</option>
                <option value="6">Móveis</option>
                <option value="7">Brinquedos</option>
                <option value="8">Eletrodomésticos</option>
                <option value="9">Trocar tempo</option>
            </select>
        </div>
    </div>
    <div class="w-100 containerPrincipal">
        <div class="col-sm-6 containerEsquerda">
            <div class="posiImagemPrincipal">
                <label for="imagemPrincipal"><img src="/Desapegados/assets/img/photos.png" width="250px" height="250px" id="PreviewPrincipal" class="imagemPreview"></label>
                <input type="file" width="150px" height="150px" accept="image/*" id="imagemPrincipal" name="imagemPrincipal" class="inputImagem">
            </div>
            <div class="imagensAdicionais pt-2">
                <div class="imagens">
                    <label for="imagem1"><img src="/Desapegados/assets/img/photos.png" width="160px" height="160px" id="Preview1" class="imagemPreview"></label>
                    <input type="file" width="150px" height="150px" accept="image/*" id="imagem1" name="imagem1" class="inputImagem">
                </div>
                <div class="imagens">
                    <label for="imagem2"><img src="/Desapegados/assets/img/photos.png" width="160px" height="160px" id="Preview2" class="imagemPreview"></label>
                    <input type="file" width="150px" height="150px" accept="image/*" id="imagem2" name="imagem2" class="inputImagem">
                </div>
                <div class="imagens">
                    <label for="imagem3"><img src="/Desapegados/assets/img/photos.png" width="160px" height="160px" id="Preview3" class="imagemPreview"></label>
                    <input type="file" width="150px" height="150px" accept="image/*" id="imagem3" name="imagem3" class="inputImagem">
                </div>
                <div class="imagens">
                    <label for="imagem4"><img src="/Desapegados/assets/img/photos.png" width="160px" height="160px" id="Preview4" class="imagemPreview"></label>
                    <input type="file" width="150px" height="150px" accept="image/*" id="imagem4" name="imagem4" class="inputImagem">
                </div>
            </div>
        </div>  
        <div class="col-sm-5 containerDireita">
            <div class="descricao">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="5" cols="5" placeholder="Descrição do anúncio..."></textarea>
            </div> 
            <div class="posiBotaoSalvar">
                <button type="submit" class="btn btn-secondary" id="salvarAlteracao" onclick="salvarAlt()">Salvar</button>
            </div>
            <div class="posiBotaos">
                <button type="submit" class="btn btn-danger" id="excluirAnuncio" value="3" onclick="aceitarDoacao(this.value)">Excluir anúncio</button>
                <button type="submit" class="btn btn-success" id="confirmaDoacao" value="1" onclick="aceitarDoacao(this.value)">Item doado</button>
            </div>
        </div>
    </div>
</form>
  </body>
  <!-- Java Script Bootstrap --> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
  crossorigin="anonymous"></script>
  <script src="../assets/js/editarProduto.js"></script>
</html>    

