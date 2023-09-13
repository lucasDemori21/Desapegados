function autenticar() {
    const email = $('#email').val();
    const password = $('#password').val();
    if (email != '' || password != '') {

        $.ajax({
            method: "POST",
            url: "../config/autentica.php",
            dataType: "json",
            data: {
                email: email,
                password: password
            },
            beforeSend: function() {
                $("#botao-login").html("Verificando...");
            },
            success: function(response) {
                if (response == 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Eita...😬',
                        text: 'Email ou senha incorretos!',
                    })
                } else if (response == 2) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Eita...😬',
                        text: 'Email não cadastrado!',
                    })
                } else if (response == 3) {
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
                $("#botao-login").html("Login");
            }
        })
    } else {
        Swal.fire(
            'Atenção!',
            'Preencha todos os campos!',
            'warning'
        )
    }
}