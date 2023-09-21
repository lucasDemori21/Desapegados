<?php
require_once('../config/conexao.php');
require_once('./header.php');

if ($id == '') {
    header('Location: login.php');
    exit;
}

if ($name_icon == '') {
    $name_icon = '../assets/img/user.png';
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="../assets/styles/telaDeUsuario.css">

<body>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-black" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <div class="profile-pic-wrapper">
                                    <div class="pic-holder">
                                        <!-- uploaded pic shown here -->
                                        <img id="profilePic" class="pic" src="<?php echo $name_icon ?>">

                                        <Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                        <label for="newProfilePhoto" class="upload-file-block">
                                            <div class="text-center">
                                                <div class="mb-2">
                                                    <i class="fa fa-camera fa-2x"></i>
                                                </div>
                                                <div class="text-uppercase">
                                                    Atualizar <br /> foto de perfil
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                </div>
                                <h5><?php echo $nome; ?></h5>
                                <input type="hidden" name="id_user" id="id_user" value="<?php echo $id; ?>">
                                <input type="hidden" name="img_profile" id="img_profile" value="<?php echo $name_icon ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Informações</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted"><?php echo $email; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Cidade</h6>
                                            <p class="text-muted"><?php echo $cidade; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Estado</h6>
                                            <p class="text-muted"><?php echo $estado; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Data de nascimento</h6>
                                            <p class="text-muted"><?php echo $data_nasc; ?></p>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <a href="./editarPerfil.php?id=<?php echo $id; ?>" class="btn btn-primary btn-lg">Editar
                                                Perfil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script src="../assets/js/telaPerfil.js"></script>