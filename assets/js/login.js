/**
 * Função para autenticar um usuário.
 */
function autenticar() {
    // Obtém o valor dos campos de email e senha
    const email = $('#email').val();
    const password = $('#password').val();

    // Verifica se o email e a senha não estão vazios
    if (email != '' || password != '') {
        // Envia uma solicitação AJAX para o servidor para autenticar o usuário
        $.ajax({
            method: "POST",
            url: "../config/autentica.php",
            dataType: "json",
            data: {
                email: email,
                password: password
            },
            beforeSend: function () {
                // Altera o texto do botão para "Verificando..."
                $("#botao-login").html("Verificando...");
            },
            success: function (response) {
                if (response == 1) {
                    // Exibe um pop-up de erro se o email ou senha estiverem incorretos
                    Swal.fire({
                        icon: 'error',
                        title: 'Eita...😬',
                        text: 'Email ou senha incorretos!',
                    })
                } else if (response == 2) {
                    // Exibe um pop-up de erro se o email não estiver cadastrado
                    Swal.fire({
                        icon: 'error',
                        title: 'Eita...😬',
                        text: 'Email não cadastrado!',
                    })
                } else if (response == 3) {
                    // Exibe um pop-up de sucesso e redireciona para a página inicial se o login for bem-sucedido
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Você está logado!',
                        showConfirmButton: false,
                        timer: 1000
                    })
                    setTimeout(() => {
                        window.location.href = "../index.php";
                    }, 1000);
                }
                // Restaura o texto do botão para "Login"
                $("#botao-login").html("Login");
            }
        })
    } else {
        // Exibe um pop-up de aviso se algum campo estiver vazio
        Swal.fire(
            'Atenção!',
            'Preencha todos os campos!',
            'warning'
        )
    }
}
