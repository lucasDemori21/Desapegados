<?php
require '../config/conexao.php';
require_once 'header.php';
$nome_produto = '';
$categoria = '';
$descricao_produto = '';
$vendedor_produto ='';

$id_anuncio = 0;
if($_GET['id_anuncio'] != ''){
    $id_anuncio = $_GET['id_anuncio'];
}
$sql = "SELECT * FROM anuncios WHERE id_anuncio = '" . $id_anuncio . "'";

$result = mysqli_query($conn, $sql);
while($dados = mysqli_fetch_assoc($result)){

    $titulo = $dados['nome_anuncio'];
    $descricao = $dados['descricao'];
    $vendedor_produto = $dados['id_categoria'];

}
?>

<link rel="stylesheet" href="../assets/styles/editarProduto.css">

<body>
    <form action="../config/cadastrarAnuncio.php" method="post" enctype="multipart/form-data">
        <h2 style="text-align: center; margin: 3% auto">Editar anuncio</h2>
        <div class="tituloProduto">
            <div class="col-sm-4">
                <input class="form-control" type="text" placeholder="Título do Anúncio..." value="<?php echo $titulo;?>" id="tituloAnuncio" name="tituloAnuncio">
            </div>
            <div class="col-sm-2">
                <select class="form-select" name="categoria" id="categoria">
                    <option value="0">Categoria</option>
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
        <div class="containerPrincipal">
            <input type="hidden" name="id_usuario" id="id_usuario" value="?id=<?php echo $id_usuario; ?>">
            <div class="col-sm-5 containerDireita">
                <div class="descricao">
                    <textarea class="form-control" id="exampleFormControlTextarea1" value="<?php echo $descricao;?>" name="descricao" rows="10" cols="100" placeholder="Descrição do anúncio..."></textarea>
                </div>
                <div id="wrapper">
                    <label for="file" class="form-label">Escolha suas fotos:</label>
                    <input id="fileUpload" class="form-control" name="fileUpload[]" type="file" multiple accept="image/gif, image/jpeg, image/png" />
                <br/>
                <div id="image-holder"></div>
            </div>
            <input type="hidden" name="id_anuncio" id="id_anuncio" value="<?php echo $id_anuncio;?>">
                <div class="posiBotaoSalvar">
                    <button type="button" value="3" onclick="atualizarAnuncio(this.value);" class="btn btn-danger">Excluir anuncio</button>
                    <button type="button" value="1" onclick="atualizarAnuncio(this.value);" class="btn btn-success">Item doado</button>
                    <button type="button" value="2" onclick="atualizarAnuncio(this.value);" class="btn btn-info">Salvar alterações</button>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="../assets/js/cadastroProduto.js"></script>

</html>

