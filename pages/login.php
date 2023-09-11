<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/styles/global.css">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>
<body class="login_container">
    <?php
            include_once 'header.php'; 

     ?>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form class="form-login form_container container">
            <div class="input-login">
                <div class="mb-3 col-lg-12">
                    <label for="email" class="texto_label form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="example@example.com">
                </div>
                <div class="mb-3 col-lg-12">
                    <label for="password" class="texto_label form-label">Senha</label>
                    <input type="password" class="form-control" id="password" placeholder="********" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn_login" id="botao-login" onclick="autenticar();">Login</button>
            <p class="mt-4"><a class="cadastro_link" href="/Desapegados/pages/cadastro.php">Não possui conta? Cadastre-se</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        function autenticar() {

            const email = $('#email').val();
            const password = $('#password').val();
            if (email != '' || password != '') {

                $.ajax({
                    method: "POST",
                    url: "../config/autentica.php",
                    dataType: "json",
                    data: {
                        email: email,
                        password: password
                    },
                    beforeSend: function() {
                        $("#botao-login").html("Verificando...");
                    },
                    success: function(response) {
                        if (response == 1) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Eita...😬',
                                text: 'Email ou senha incorretos!',
                            })
                        } else if (response == 2) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Eita...😬',
                                text: 'Email não cadastrado!',
                            })
                        }else if (response == 3) {
                            window.location.href = "../index.php?login=3";
                        }
                        $("#botao-login").html("Login");
                    }
                })
            } else {
                alert('Preencha todos os campos!')
            }
        }
    </script>
</body>
</html>