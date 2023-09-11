<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!-- Arquivos CSS -->
    <link rel="stylesheet" href="../assets/styles/global.css">
    <link rel="stylesheet" href="../assets/styles/cadastro.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Cadastro</title>
</head>
<body>
    <?php
        include_once('./header.php');
     ?>
    <section class="container my-4">
        <form 
            action="../config/cadastrar.php" 
            method="POST" 
            class="form_container d-flex flex-column justify-content-center align-items-center"
        >
            <h1>Cadastro</h1>
            <!-- Nome -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_nome" class="texto_label form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="id_nome" 
                placeholder="Insira seu nome" required>
            </div>
            <!-- Usuário -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_usuario" class="texto_label form-label">Usuário</label>
                <input type="text" name="usuario" class="form-control" id="id_usuario" 
                placeholder="Insira seu usuário" required>
            </div>
            <!-- Email -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_email" class="texto_label form-label">Email</label>
                <input type="email" name="email" id="id_email" class="form-control" 
                placeholder="email@dominio.com" required>
            </div>
            <!-- Telefone -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_tel" class="texto_label form-label">Telefone</label>
                <input type="tel" name="tel" id="id_tel" class="form-control" 
                placeholder="(DDD) XXXXX-XXXX" maxlength="15" required onkeyup="handlePhone(event)">
            </div>
            <!-- CPF -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_cpf" class="texto_label form-label">CPF</label>
                <input type="text" name="cpf" id="id_cpf" class="form-control" 
                placeholder="Insira seu CPF" maxlength="13" required onkeyup="handleCpf(event)">
            </div>
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_cep" class="texto_label form-label">CEP</label>
                <input type="text" name="id_cep" id="id_cep" class="form-control" 
                placeholder="Insira seu CEP" maxlength="9" required>
            </div>
            <!-- Data de nascimento -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_datanasc" class="texto_label form-label">Data de nascimento</label>
                <input type="date" name="data_nasc" id="id_datanasc" class="form-control">
            </div>
            <!-- Estado -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_estado" class="texto_label form-label">Estado</label>
                <select name="estado" id="id_estado" class="form-select">
                    <option value=" ">Selecione o estado</option>
                    <option value="SC">SC</option>
                </select>
            </div>
            <!-- Cidade -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_cidade" class="texto_label form-label">Cidade</label>
                <select name="cidade" id="id_cidade" class="form-select">
                    <option value=" ">Selecione a cidade</option>
                    <option value="Jlle">Joinville</option>
                </select>
            </div>
            <!-- Bairro -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_bairro" class="texto_label form-label">Bairro</label>
                <input type="text" name="bairro" id="id_bairro" class="form-control"
                placeholder="Ex: Nome do bairro">
            </div>
            <!-- Logradouro -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_logradouro" class="texto_label form_label">Logradouro</label>
                <input type="text" name="logradouro" id="id_logradouro" class="form-control"
                placeholder="Ex: Rua Princesa Isabel, 123">
            </div>
            <!-- Complemento -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_complemento" class="texto_label form-label">Complemento</label>
                <input type="text" name="complemento" id="id_complemento" class="form-control"
                placeholder="Informe um complemento">
            </div>
            <!-- Número da casa/apto -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_num" class="texto_label form-label">Número do(a) apto/casa</label>
                <input type="text" name="num" id="id_num" class="form-control"
                placeholder="Ex: 111" required>
            </div>
            <!-- Senha -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_senha" class="texto_label form-label">Senha</label>
                <input type="password" name="senha" id="id_senha" class="form-control" 
                placeholder="Insira sua senha" maxlength="20" minlength="6" required onchange="validatePasswordLength(event)">
            </div>
            <!-- Repetir senha -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="rep_senha" class="texto_label form-label">Repetir senha</label>
                <input type="password" name="rep_senha" id="rep_senha" class="form-control"
                placeholder="Repita sua senha" maxlength="20" minlength="6" required onchange="validatePasswords()">
            </div>
            <div class="d-flex justify-content-center align-items-center pb-4">
                <button type="submit" class="botao_cadastrar btn btn-primary mx-3 my-2 px-3 py-2">
                    Cadastrar
                </button>
                <button type="button" class="botao_cancelar btn btn-secondary mx-3 my-2 px-3 py-2">
                    Cancelar
                </button>
        </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="../assets/js/cadastro.js"></script>
</body>
</html>