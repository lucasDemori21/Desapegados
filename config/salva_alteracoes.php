<?php
require("conexao.php");


    if(isset($_POST['salvarBtn'])){
        $foto1 = $_FILES['imagemPrincipal'];
        $foto2 = $_FILES['imagem1'];
        $foto3 = $_FILES['imagem2'];
        $foto4 = $_FILES['imagem3'];
        $foto5 = $_FILES['imagem4'];

        $nomeProduto = $_POST['tituloProduto'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        
        if (isset($foto) && !empty($foto["name"])) {
            // Largura máxima em pixels
            $largura = 2048;
            // Altura máxima em pixels
            $altura = 2048;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 500000;
            $error = array();
       
            // Verifica se o arquivo é uma imagem
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto1["type"])){
                $error[1] = "Isso não é uma imagem.";
            }
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto2["type"])){
                $error[1] = "Isso não é uma imagem.";
            }
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto3["type"])){
                $error[1] = "Isso não é uma imagem.";
            }
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto4["type"])){
                $error[1] = "Isso não é uma imagem.";
            }
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto5["type"])){
                $error[1] = "Isso não é uma imagem.";
            }
       
            // Pega as dimensões da imagem
            $dimensoes1 = getimagesize($foto1["tmp_name"]);
            $dimensoes2 = getimagesize($foto2["tmp_name"]);
            $dimensoes3 = getimagesize($foto3["tmp_name"]);
            $dimensoes4 = getimagesize($foto4["tmp_name"]);
            $dimensoes5 = getimagesize($foto5["tmp_name"]);

       
            // Verifica se a largura da imagem é maior que a largura permitida
            if($dimensoes1[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
       
            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes1[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
       
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($foto1["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

            if($dimensoes2[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
       
            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes2[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
       
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($foto2["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

            if($dimensoe3[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
       
            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes3[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
       
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($foto3["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

            if($dimensoes4[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
       
            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes4[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
       
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($foto4["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

            if($dimensoes5[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
       
            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes5[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
       
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($foto5["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }
       
            // Se não houver nenhum erro
            if (count($error) == 0) {
       
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto1["name"], $ext1);
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto2["name"], $ext2);
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto3["name"], $ext3);
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto4["name"], $ext4);
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto5["name"], $ext5);
                // Gera um nome único para a imagem
                $nome_imagem1 = md5(uniqid(time())) . "." . $ext1[1];
                $nome_imagem2 = md5(uniqid(time())) . "." . $ext2[1];
                $nome_imagem3 = md5(uniqid(time())) . "." . $ext3[1];
                $nome_imagem4 = md5(uniqid(time())) . "." . $ext4[1];
                $nome_imagem5 = md5(uniqid(time())) . "." . $ext5[1];

                // Caminho de onde ficará a imagem
                $caminho_imagem1 = "assets/img/imgAnuncios" . $nome_imagem1;
                $caminho_imagem2 = "assets/img/imgAnuncios" . $nome_imagem2;
                $caminho_imagem3 = "assets/img/imgAnuncios" . $nome_imagem3;
                $caminho_imagem4 = "assets/img/imgAnuncios" . $nome_imagem4;
                $caminho_imagem5 = "assets/img/imgAnuncios" . $nome_imagem5;
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem1);
                move_uploaded_file($foto["tmp_name"], $caminho_imagem2);
                move_uploaded_file($foto["tmp_name"], $caminho_imagem3);
                move_uploaded_file($foto["tmp_name"], $caminho_imagem4);
                move_uploaded_file($foto["tmp_name"], $caminho_imagem5);
            }
        }
       
        // Define o nome da imagem como vazio caso não tenha sido enviada
        if (!isset($nome_imagem1)) {
            $nome_imagem1 = '';
        }
        if (!isset($nome_imagem2)) {
            $nome_imagem2 = '';
        }
        if (!isset($nome_imagem3)) {
            $nome_imagem3 = '';
        }
        if (!isset($nome_imagem4)) {
            $nome_imagem4 = '';
        }
        if (!isset($nome_imagem5)) {
            $nome_imagem5 = '';
        }
        $array_nome_image = array($nome_imagem1, $nome_imagem2, $nome_imagem3, $nome_imagem4, $nome_imagem5);
       
        // Insere os dados no banco
        $sql = "INSERT INTO db.desapegados.produtos(nome_produto, img_prod, descricao, id_categoria) VALUES
        ('".$nomeProduto."', '".$array_nome_image."', '".$descricao."', '".$categoria."');";
       
        if (mysqli_query($conn, $sql)) {
            header('Location: ../pages/editarProduto?status=3');
        } else {
            header('Location: ../pages/editarProduto?status=2');
        }
        mysqli_close($conn);
     }
            

?>