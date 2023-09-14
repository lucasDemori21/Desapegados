<?php
require_once '../config/conexao.php';
require_once 'header.php';
?>

<link rel="stylesheet" href="../assets/styles/editarProduto.css">

<body>
    <form action="../config/cadastrarAnuncio.php" method="post" enctype="multipart/form-data">
    <h2 style="text-align: center; margin: 3% auto">Cadastrar anuncio</h2>
        <div class="tituloProduto">
            <div class="col-sm-4">
                <input class="form-control" type="text" placeholder="Título do Anúncio..." id="tituloAnuncio" name="tituloAnuncio">
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
            <input type="hidden" name="status" id="status" value="1">
            <div class="col-sm-5 containerDireita">
                <div class="descricao">
                    <textarea class="form-control" id="descricao" name="descricao" rows="10" cols="100" placeholder="Descrição do anúncio..."></textarea>
                </div>
                <div id="wrapper">
                    <label for="file" class="form-label">Escolha suas fotos:</label>
                    <input id="fileUpload" class="form-control" name="fileUpload[]" type="file" multiple accept="image/gif, image/jpeg, image/png" />
                <br/>
                <div id="image-holder"></div>
            </div>
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id;?>">
                <div class="posiBotaoSalvar">
                    <button type="submit" class="btn btn-success">Cadastrar produto</button>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="../assets/js/cadastroAnuncio.js"></script>
</html>