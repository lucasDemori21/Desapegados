/**
 * Função para aceitar uma doação.
 // @param {string} doacao - O tipo de doação a ser aceito.
 */
function aceitarDoacao(doacao) {
    // Obtém os parâmetros da URL, especificamente o ID do anúncio
    const urlParams = new URLSearchParams(window.location.search);
    const anuncio = urlParams.get('idAnuncio');

    // Obtém o ID do usuário do elemento com o ID 'usuario'
    const idUser = $('#usuario').val();

    // Verifica se o ID do usuário não está vazio
    if (idUser != "") {
        // Envia uma solicitação AJAX para o servidor para aceitar a doação
        $.ajax({
            url: "../config/aceitaDoacao.php",
            method: "POST",
            data: {
                id: anuncio,
                doacao: doacao
            },
            success: function (response) {
                if (response == 1) {
                    // Exibe um pop-up de sucesso se a doação for aceita com sucesso
                    Swal.fire(
                        'success',
                        'Sucesso',
                        'Item doado!'
                    )
                } else if (response == 2) {
                    // Exibe um pop-up de erro se ocorrer algum problema
                    Swal.fire(
                        'error',
                        'Ocorreu algum problema, tente novamente mais tarde.',
                        ''
                    )
                }
            }
        });
    } else {
        // Exibe um pop-up de aviso se o usuário não estiver logado
        Swal.fire({
            icon: 'warning',
            title: 'Aviso',
            showConfirmButton: true,
            footer: '<a href="cadastro.php">Não possui uma conta? Clique aqui para se cadastrar!</a>',
            html: 'Você precisa estar logado para aceitar uma doação!<br><a href="login.php">Já possui uma conta? Faça seu login!</a>'
        })
    }
}
