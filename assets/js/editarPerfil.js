// Obtenha o parâmetro 'estadoPerfil' da URL
const urlParams = new URLSearchParams(window.location.search);
const estadoPerfil = urlParams.get('estadoPerfil');

// Verifique o valor de 'estadoPerfil' e exiba mensagens correspondentes
if (estadoPerfil == 1) {
    // Popup de sucesso para perfil editado
    Swal.fire({
        icon: 'success',
        title: 'O perfil foi editado!',
    });
}

if (estadoProduto == 6) {
    // Popup de erro ao editar o perfil
    Swal.fire({
        icon: 'error',
        title: 'Eita...😬',
        text: 'Houve um erro ao editar o perfil!',
    });
}

// Função para aplicar uma máscara de telefone
const handlePhone = (event) => {
    let input = event.target;
    input.value = phoneMask(input.value);
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '');
    value = value.replace(/(\d{2})(\d)/, "($1) $2");
    value = value.replace(/(\d)(\d{4})$/, "$1-$2");
    return value;
}

// Função para verificar a senha atual
function verificarSenha(senha, id) {
    $.ajax({
        url: "../config/verificarSenha.php",
        method: "POST",
        data: {
            senha: senha,
            id: id
        },
        success: function (obj) {
            if (obj == '1') {
                // Senha correta, permitir a atualização da senha
                Swal.fire({
                    icon: 'success',
                    title: 'Pronto',
                    text: 'Agora você pode atualizar sua senha',
                })
                $("#colocarNovaSenha").removeAttr("readonly");
                $("#repetirNovaSenha").removeAttr("readonly");
                $("#colocarNovaSenha").focus();
            } else {
                // Senha incorreta, exibir mensagem de erro
                Swal.fire({
                    icon: 'error',
                    title: 'Eita...😬',
                    text: 'Senha incorreta!',
                })
            }
        }
    })
}

// Função para verificar a nova senha
function verificaNovaSenha() {
    const senha = $("#repetirNovaSenha").val();
    const senhaR = $("#colocarNovaSenha").val();

    if (senha !== senhaR) {
        // Senhas não coincidem, exibir mensagem de erro
        Swal.fire({
            icon: 'error',
            title: 'Eita...😬',
            text: 'As novas senhas não são iguais!',
        })
    }
    if (senha.length < 6) {
        // Senha deve ter pelo menos 6 caracteres, exibir mensagem de aviso
        Swal.fire(
            'Aviso',
            'A senha não contém 6 caracteres',
            'info'
        )
        return false;
    }
    return true;
}
