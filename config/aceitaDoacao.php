<?php
// Inclui o arquivo de conexão com o banco de dados.
require_once 'conexao.php';

// Verifica se o campo 'doacao' na solicitação POST não está vazio.
if (!empty($_POST['doacao'])) {
    // Obtém o valor do campo 'doacao' da solicitação POST e o armazena na variável $doacao.
    $doacao = $_POST['doacao'];

    // Obtém o valor do campo 'id' da solicitação POST e o armazena na variável $id_anuncio.
    $id_anuncio = $_POST['id'];

    // Verifica se o valor de $doacao é igual a '1'.
    if ($doacao == '1') {
        // Cria uma consulta SQL para atualizar o campo 'status_anuncio' na tabela 'anuncios'.
        $sql = "UPDATE anuncios 
                SET status_anuncio = '" . $doacao . "' 
                WHERE id_anuncio = '" . $id_anuncio . "'";
        
        // Executa a consulta SQL usando a conexão com o banco de dados ($conn).
        // Se a consulta for bem-sucedida, retorna '1' (indicando sucesso).
        // Caso contrário, retorna '2' (indicando erro).
        if (mysqli_query($conn, $sql)) {
            echo '1';
        } else {
            echo '2';
        }
    }
}
