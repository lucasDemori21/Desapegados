<?php
session_start();
// ini_set('display_errors', 0);
$nome = '';
$id = '';
$name_icon = '';

if(!empty($_SESSION['usn'])){

    $sql = "SELECT id_usuario, nome_usuario, nome_icon, cidade, estado, data_nascimento, email, telefone FROM usuarios WHERE id_usuario = '" . $_SESSION['usn'] . "'";
    $result = mysqli_query($conn, $sql);
    while ($dados = mysqli_fetch_assoc($result)) {
        $id = $dados['id_usuario'];
        $nome = $dados['nome_usuario'];
        $email = $dados['email'];
        $cidade = $dados['cidade'];
        $telefone = $dados['telefone'];
    $estado = $dados['estado'];
    $data_nasc = date('d/m/Y',  strtotime($dados['data_nascimento']));
    $name_icon = $dados['nome_icon'];
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/styles/global.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<header class="main-header">
    <div class="container-header">
        <div class="logo-container">
            <div class="logo">
                <a href="\Desapegados\index.php">
                    <div class="logo_img"></div>
                </a>
            </div>
        </div>
        <div class="search-container">
            <input type="text" name="barra" id="barra" class="search-input" placeholder="Pesquisar">
            <div class="search-icon">
                <button class="btn btn-success ms-1" type="button" onclick="pesquisar()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </div>
        <?php
        if ($id == '') {
        ?>
            <div class="login-container d-flex">
                <p class="criar_conta"><span><a href="/Desapegados/pages/cadastro.php">Criar conta</a></span></p>
                <p class="conta"><a href="/Desapegados/pages/login.php">Conta</a></p>
            </div>
        <?php
        } else {
        ?>
            <div class="login-container d-flex">
                <div class="btn-group mx-3">
                    <button type="button" class="btn btn-success">
                        <a href="/Desapegados/pages/telaDeUsuario.php" class="text-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <span class="px-2">
                                <?php
                                echo $nome;
                                ?>
                            </span>
                        </a>
                    </button>
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item editarLink" href="./editarPerfil.php?id=<?php echo $id; ?>">Editar Conta</a></li>
                        <li><a class="dropdown-item cadastro" href="./cadastroAnuncio.php?id=<?php echo $id; ?>">Adicionar Anúncio</a></li>
                        <li><a class="dropdown-item anuncio" href="./anunciosUsuario.php?id=<?php echo $id; ?>">Meus Anúncios</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/Desapegados/pages/login.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</header>