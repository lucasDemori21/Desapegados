function aceitarDoacao(doacao) {
    const urlParams = new URLSearchParams(window.location.search);
    const anuncio = urlParams.get('idAnuncio');
    const idUser = $('#usuario').val();
    if (idUser != "") {
        $.ajax({
            url: "../config/aceitaDoacao.php",
            method: "POST",
            data: {
                id: anuncio,
                doacao: doacao
            },
            success: function(response) {
                if (response == 1) {
                    Swal.fire(
                        'success',
                        'Sucesso',
                        'Item doado!',
                    )
                } else if (response == 2) {
                    Swal.fire(
                        'error',
                        'Ocorreu algum problema, tente novamente mais tarde.',
                        '',
                    )
                }
            }
        })
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Aviso',
            showConfirmButton: true,
            footer:'<a href="cadastro.php">Não possui uma conta? Clique aqui para se cadastrar!</a>',
            html:'Você precisa estar logado para aceitar uma doação!<br><a href="login.php">Já possui uma conta? faça seu login!</a>'

        })
    }
}