<?php
ini_set('display_errors', 0);
session_start();
require './config/conexao.php';

?>
<!doctype html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DESAPEGADOS</title>
    <link rel="stylesheet" href="./assets/styles/global.css">
    <link rel="stylesheet" href="./assets/styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <header>
      <?php

        if($_SESSION['usn'] == ''){
          include_once './pages/header.php'; 
        }else{
          $sql = "SELECT id_usuario, nome_usuario FROM usuarios WHERE id_usuario = '". $_SESSION['usn'] ."'";
          $result = mysqli_query($conn, $sql);
          while ($dados = mysqli_fetch_assoc($result)){
            include_once './pages/headerLogado.php'; 
          }
        } 
      ?>
    </header>
    <section class="d-flex justify-content-center align-items-center title_container">
      <h2 class="title">Desapegados</h2>
    </section>
    <section class="d-flex flex-column justify-content-center align-items-center categories_container">
      <h3>Categorias</h3>
      <div>
          <div>
            <ul class="category_row">
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=1">
                    <img class="category_img" src="./assets/img/animais.png" 
                      alt="Categoria de pets">
                  </a>
                  <p><span class="category_name">Pets</span></p>
                </div>
              </li>
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=2">
                    <img class="category_img" src="./assets/img/literatura.png" 
                      alt="Categoria de literatura">
                  </a>
                  <p><span class="category_name">Literatura</span></p>
                </div>
              </li>
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=3">
                    <img class="category_img" src="./assets//img/roupas.png" 
                      alt="Categoria de roupas">
                  </a>
                  <p><span class="category_name">Roupas</span></p>
                </div>
              </li>
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=4"> 
                    <img class="category_img" src="./assets/img/alimentos.png" 
                      alt="Categoria de alimentos">
                  </a>
                  <p><span class="category_name">Alimentos</span></p>
                </div>
              </li>
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=5">
                    <img class="category_img" src="./assets/img/eletronicos.png" 
                      alt="Categoria de eletrônicos">
                  </a>
                  <p><span class="category_name">Eletrônicos</span></p>
                </div>
              </li>
            </ul>
          </div>
          <div>
            <ul class="category_row">
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=6">
                    <img class="category_img" src="./assets/img/moveis.png" 
                      alt="Categoria de móveis">
                  </a>
                  <p><span class="category_name">Móveis</span></p>
                </div>
              </li>
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=7">
                    <img class="category_img" src="./assets/img/brinquedos.png" 
                      alt="Categoria de brinquedos">
                  </a>
                  <p><span class="category_name">Brinquedos</span></p>
                </div>
              </li>
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=8">
                    <img class="category_img" src="./assets//img/eletrodomesticos.png" 
                      alt="Categoria de eletrodomésticos">
                  </a>
                  <p><span class="category_name">Eletrodomésticos</span></p>
                </div>
              </li>
              <li class="donation_category">
                <div class="d-flex flex-column align-items-center">
                  <a href="./pages/anuncios.php?categoria=9">
                    <img class="category_img" src="./assets/img/trocar_tempo.png" 
                      alt="Categoria de troca de tempo">
                  </a>
                  <p><span class="category_name">Trocar tempo</span></p>
                </div>
              </li>
            </ul>
        </div>
      </div>
    </section>
    <section>
      <!-- TO DO Produtos para doação -->
      <!-- OBS: A implementação dessa funcionalidade dependerá da conexão com o back-end -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="./assets/js/index.js"></script>
  </body>
</html>