<?php
require_once('../config/conexao.php');
require_once('header.php');

?>
<link rel="stylesheet" href="../assets/styles/login.css">
<body class="login_container">
    <div class="container">
        <form class="form-login form_container">
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
            <a class="cadastro_link" href="/Desapegados/pages/cadastro.php">Não possui conta? Cadastre-se</a>
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