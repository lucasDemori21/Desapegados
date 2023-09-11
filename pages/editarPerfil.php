<?php 
session_start();
$id = $_GET['id'];
require_once '../config/conexao.php';
$sql = "SELECT * FROM usuarios WHERE id_usuario = '" . $id ."'";
$result = mysqli_query($conn, $sql);

while($dados = mysqli_fetch_assoc($result)){
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/global.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Desapegados</title>
</head>
<body>
    <?php
        if($_SESSION['usn'] != ''){
            include_once 'header.php'; 
        }else{
            $sql = "SELECT id_usuario, nome_usuario, FROM usuarios WHERE id_usuario = '".$_SESSION['usn']."'";
          $result = mysqli_query($conn, $sql);
          while ($dados = mysqli_fetch_assoc($result)){
            include_once 'headerLogado.php'; 
        }
    } 
     ?>
     <script src="../assets/js/editarPerfil.js"></script>
     <main class="py-3" justify-content-center align-items-center">
        <div class="container">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="colocarNome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" value="<?php echo $dados['nome_usuario'];?>" id="colocarNome" placeholder="Seu Nome">
                </div>
                <div class="col-md-6">
                    <label for="colocarSenha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="colocarSenha" placeholder="Sua senha">
                </div>
                <div class="col-md-6">
                    <label for="colocarNovaSenha" class="form-label">Nova Senha</label>
                    <input type="password" class="form-control" id="colocarNovaSenha" placeholder="Defina sua nova senha">
                </div>
                <div class="col-md-6">
                    <label for="repetirNovaSenha" class="form-label">Repetir nova senha</label>
                    <input type="password" class="form-control" id="repetirNovaSenha" placeholder="Repita sua nova senha">
                </div>
                <div class="col-12">
                    <label for="colocarRua" class="form-label">Rua</label>
                    <input type="text" class="form-control" id="colocarRua" value="<?php echo $dados['logradouro'];?>" placeholder="Rua dos Bobos">
                </div>
                <div class="col-12">
                    <label for="colocarNumero" class="form-label">Número</label>
                    <input type="number" class="form-control" id="colocarNumero" value="<?php echo $dados['num_casa'];?>"
                        placeholder="983">
                </div>
                <div class="col-12">
                    <label for="colocarLogradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" id="colocarLogradouro" value="<?php echo $dados['bairro'];?>"
                        placeholder="Casa, geminado ou apartamento">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="inputCity" value="<?php echo $dados['cidade'];?>"> 
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Estado</label>
                        <select id="escolherEstado" class="form-select" value="<?php echo $dados['estado'];?>">
                            <option value="">Selecione</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espirito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">CEP</label>
                    <input type="number" class="form-control" id="inputZip">
                </div>
                <div class="col-12">
                    <label for="colocarEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="colocarEmail" value="<?php echo $dados['email'];?>"
                        placeholder="seninha@gmail.com">
                </div>
                <div class="col-6">
                    <label for="colocarTelefoneFixo" class="form-label">Telefone Fixo</label>
                    <input type="number" class="form-control" id="colocarTelefoneFixo" value="<?php echo $dados['telefone'];?>"
                        placeholder="+55 47 97653-8736">
                </div>
                <div class="col-6">
                    <label for="colocarCelular" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="colocarCelular" value="<?php echo $dados['telefone'];?>"
                        placeholder="+55 47 97653-8736">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<?php
}
?>