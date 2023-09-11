<header class="main-header">
    <link rel="stylesheet" href="../assets/styles/global.css" />
    <div class="container-header">
        <div class="logo-container">
            <div class="logo">
                <a href="\Desapegados\index.php">
                    <div class="logo_img"></div>
                </a>
            </div>
        </div>
        <div class="search-container">
            <select name="barra_pesquisa" id="id_barra_pesquisa" class="search-select">
                <option value="0">Todas</option>
                <option value="1">Pets</option>
                <option value="2">Literatura</option>
                <option value="3">Roupas</option>
                <option value="4">Alimentos</option>
                <option value="5">Eletrônicos</option>
                <option value="6">Móveis</option>
                <option value="7">Brinquedos</option>
                <option value="8">Eletrodomésticos</option>
                <option value="9">Trocar tempo</option>
            </select>
            <input type="text" name="barra" id="barra" class="search-input">
            <div class="search-icon"></div>
        </div>
        <div class="login-container d-flex">
            <div class="btn-group mx-3">
                <button type="button" class="btn btn-success">
                    <a href="/Desapegados/pages/telaDeUsuario.php" class="text-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <span class="px-2">
                            <?php
                                echo $dados['nome_usuario'];
                             ?>
                        </span>
                    </a>
                </button>
                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./pages/editarPerfil.php?id=<?php echo $dados['id_usuario'];?>">Editar Conta</a></li>
                    <li><a class="dropdown-item" href="./pages/cadastroAnuncio.php?id=<?php echo $dados['id_usuario'];?>">Adicionar Produto</a></li>
                    <li><a class="dropdown-item" href="./pages/anunciosUsuario.php?id=<?php echo $dados['id_usuario'];?>">Meus Anuncios</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/Desapegados/pages/login.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>