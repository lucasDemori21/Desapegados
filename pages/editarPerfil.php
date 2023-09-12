<?php
require_once '../config/conexao.php';
require_once 'header.php';
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id_usuario = '" . $id . "'";
$result = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_assoc($result)) {
?>

    <body>       
        
        <script src="../assets/js/editarPerfil.js"></script>
        <main class="py-3" justify-content-center align-items-center">
            <div class="container">
                <form class="row g-3" method="POST" action="../config/updateUser.php">
                    <div class="col-md-6">
                        <label for="colocarNome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $dados['nome_usuario']; ?>" id="colocarNome" placeholder="Seu Nome">
                    </div>
                    <div class="col-md-6">
                        <label for="colocarSenha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="colocarSenha" placeholder="Sua senha" onblur="verificarSenha(this.value, <?php echo $id;?>);">
                    </div>
                    <div class="col-md-6">
                        <label for="colocarNovaSenha" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="colocarNovaSenha" placeholder="Defina sua nova senha" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="repetirNovaSenha" class="form-label">Repetir nova senha</label>
                        <input type="password" class="form-control" name="senha" id="repetirNovaSenha" onblur="verificaNovaSenha()" placeholder="Repita sua nova senha" readonly>
                    </div>
                    <div class="col-12">
                        <label for="colocarRua" class="form-label">Rua</label>
                        <input type="text" class="form-control" id="colocarRua" name="rua" value="<?php echo $dados['logradouro']; ?>" placeholder="Rua dos Bobos">
                    </div>
                    <div class="col-12">
                        <label for="colocarNumero" class="form-label">Número</label>
                        <input type="number" class="form-control" id="colocarNumero" name="numero" value="<?php echo $dados['num_casa']; ?>" placeholder="983">
                    </div>
                    <div class="col-12">
                        <label for="colocarLogradouro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $dados['bairro']; ?>" placeholder="Casa, geminado ou apartamento">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="inputCity" name="cidade" value="<?php echo $dados['cidade']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Estado</label>
                        <select id="escolherEstado" class="form-select" name="estado">
                            <option value="">Selecione</option>
                            <?php
                            $estados = array(
                                "AC" => "Acre",
                                "AL" => "Alagoas",
                                "AP" => "Amapá",
                                "AM" => "Amazonas",
                                "BA" => "Bahia",
                                "CE" => "Ceará",
                                "DF" => "Distrito Federal",
                                "ES" => "Espirito Santo",
                                "GO" => "Goiás",
                                "MA" => "Maranhão",
                                "MS" => "Mato Grosso do Sul",
                                "MT" => "Mato Grosso",
                                "MG" => "Minas Gerais",
                                "PA" => "Pará",
                                "PB" => "Paraíba",
                                "PR" => "Paraná",
                                "PE" => "Pernambuco",
                                "PI" => "Piauí",
                                "RJ" => "Rio de Janeiro",
                                "RN" => "Rio Grande do Norte",
                                "RS" => "Rio Grande do Sul",
                                "RO" => "Rondônia",
                                "RR" => "Roraima",
                                "SC" => "Santa Catarina",
                                "SP" => "São Paulo",
                                "SE" => "Sergipe",
                                "TO" => "Tocantins"
                            );
                            foreach ($estados as $sigla => $nome) {
                                $selected = ($dados['estado'] === $sigla) ? "selected" : "";
                                echo "<option value=" . $sigla . " $selected>$nome</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="inputZip" name="cep" value="<?php echo $dados['cep'] ?>">
                    </div>
                    <div class="col-12">
                        <label for="colocarEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="colocarEmail" name="email" value="<?php echo $dados['email']; ?>" placeholder="seninha@gmail.com">
                    </div>
                    <div class="col-6">
                        <label for="colocarTelefoneFixo" class="form-label" >Telefone Fixo</label>
                        <input type="text" class="form-control" name="telefone" id="colocarTelefoneFixo" value="<?php echo $dados['telefone']; ?>" placeholder="+55 47 97653-8736" maxlength="15" onkeyup="handlePhone(event)">
                    </div>
                    <div class="col-6">
                        <label for="colocarCelular" class="form-label">Celular</label>
                        <input type="text" class="form-control" name="celular" id="colocarCelular" value="<?php echo $dados['telefone']; ?>" placeholder="+55 47 97653-8736" maxlength="15" onkeyup="handlePhone(event)">
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
<script src="../assets/js/editarPerfil.js"></script>
