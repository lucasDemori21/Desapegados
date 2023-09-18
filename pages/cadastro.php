<?php
require_once('../config/conexao.php');
require_once('header.php');
?>
<link rel="stylesheet" href="../assets/styles/cadastro.css">

<body>
    <section class="container my-4">
        <form action="../config/cadastrar.php" method="POST" class="form_container d-flex flex-column justify-content-center align-items-center">
            <h1>Cadastro</h1>
            <!-- Nome -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_nome" class="texto_label form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="id_nome" placeholder="Insira seu nome" required>
            </div>
            <!-- Usuário -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_usuario" class="texto_label form-label">Usuário</label>
                <input type="text" name="usuario" class="form-control" id="id_usuario" placeholder="Insira seu usuário" required>
            </div>
            <!-- Email -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_email" class="texto_label form-label">Email</label>
                <input type="email" name="email" id="id_email" class="form-control" placeholder="email@dominio.com" required>
            </div>
            <!-- Telefone -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_tel" class="texto_label form-label">Telefone</label>
                <input type="text" name="tel" id="id_tel" class="form-control" placeholder="(99) 99999-9999" maxlength="15" required onkeyup="handlePhone(event)">
            </div>
            <!-- CPF -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_cpf" class="texto_label form-label">CPF</label>
                <input type="text" name="cpf" id="id_cpf" class="form-control" placeholder="Insira seu CPF" maxlength="13" required onkeyup="handleCpf(event)">
            </div>
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_cep" class="texto_label form-label">CEP</label>
                <input type="text" name="id_cep" id="id_cep" class="form-control" placeholder="Insira seu CEP" maxlength="9" required>
            </div>
            <!-- Data de nascimento -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_datanasc" class="texto_label form-label">Data de nascimento</label>
                <input type="date" name="data_nasc" onblur="calculaIdade()" id="id_datanasc" class="form-control">
            </div>
            <!-- Estado -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_estado" class="texto_label form-label">Estado</label>
                <select id="id_estado" name="estado" class="form-select">
                    <option value="">SELECIONE UM ESTADO</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
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
                    <option value="EX">Estrangeiro</option>
                </select>
            </div>
            <!-- Cidade -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_cidade" class="texto_label form-label">Cidade</label>
                <input name="cidade" id="id_cidade" class="form-control">
            </div>
            <!-- Bairro -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_bairro" class="texto_label form-label">Bairro</label>
                <input type="text" name="bairro" id="id_bairro" class="form-control" placeholder="Ex: Nome do bairro">
            </div>
            <!-- Logradouro -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_logradouro" class="texto_label form_label">Logradouro</label>
                <input type="text" name="logradouro" id="id_logradouro" class="form-control" placeholder="Ex: Rua Princesa Isabel, 123">
            </div>
            <!-- Complemento -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_complemento" class="texto_label form-label">Complemento</label>
                <input type="text" name="complemento" id="id_complemento" class="form-control" placeholder="Informe um complemento">
            </div>
            <!-- Número da casa/apto -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_num" class="texto_label form-label">Número do(a) apto/casa</label>
                <input type="text" name="num" id="id_num" class="form-control" placeholder="Ex: 111" required>
            </div>
            <!-- Senha -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="id_senha" class="texto_label form-label">Senha</label>
                <input type="password" name="senha" id="id_senha" class="form-control" placeholder="Insira sua senha" maxlength="20" minlength="6" required onchange="validatePasswordLength(event)">
            </div>
            <!-- Repetir senha -->
            <div class="mb-3 col-10 col-sm-6 col-md-5 col-lg-5">
                <label for="rep_senha" class="texto_label form-label">Repetir senha</label>
                <input type="password" name="rep_senha" id="rep_senha" class="form-control" placeholder="Repita sua senha" maxlength="20" minlength="6" required onchange="validatePasswords()">
            </div>
            <div class="d-flex justify-content-center align-items-center pb-4">
                <button type="submit" class="botao_cadastrar btn btn-primary mx-3 my-2 px-3 py-2">
                    Cadastrar
                </button>
        </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="../assets/js/cadastro.js"></script>
</body>

</html>