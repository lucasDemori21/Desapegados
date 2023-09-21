<?php
session_start();
session_destroy();
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
</body>

</html>
<script src="../assets/js/login.js"></script>