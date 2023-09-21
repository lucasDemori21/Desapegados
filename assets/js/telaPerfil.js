$(document).on("change", ".uploadProfileInput", function () {
    // Captura o elemento que acionou o evento de mudança
    var triggerInput = this;

    // Obtém a URL da imagem atual da classe .pic dentro do elemento .pic-holder mais próximo
    var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");

    // Obtém uma referência para o elemento .pic-holder mais próximo
    var holder = $(this).closest(".pic-holder");

    // Obtém uma referência para o elemento .profile-pic-wrapper mais próximo
    var wrapper = $(this).closest(".profile-pic-wrapper");

    // Remove qualquer alerta de erro existente dentro de .profile-pic-wrapper
    $(wrapper).find('[role="alert"]').remove();

    // Faz com que o elemento que acionou o evento de mudança perca o foco
    triggerInput.blur();

    // Verifica se o navegador suporta a API File e se há arquivos selecionados
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) {
        return;
    }

    // Verifica se o arquivo selecionado é uma imagem
    if (/^image/.test(files[0].type)) {
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);

        // Quando o carregamento do arquivo estiver completo
        reader.onloadend = function () {
            $(holder).addClass("uploadInProgress");
            $(holder).find(".pic").attr("src", this.result);
            $(holder).append(
                '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
            );

            setTimeout(() => {
                $(holder).removeClass("uploadInProgress");
                $(holder).find(".upload-loader").remove();

                // Simula o sucesso do upload (em 90% das vezes)
                if (Math.random() < 0.9) {
                    // Obtém o arquivo selecionado
                    const fileInput = document.querySelector('#newProfilePhoto');
                    const img = fileInput.files[0];

                    // Obtém o ID do usuário e a imagem de perfil atual
                    const id = $('#id_user').val();
                    const img_profile = $('#img_profile').val();

                    // Cria um objeto FormData para enviar dados para o servidor
                    const formData = new FormData();
                    formData.append('new_img', img);
                    formData.append('id', id);
                    formData.append('img_profile', img_profile);

                    // Envia uma solicitação AJAX para o servidor
                    $.ajax({
                        url: "../config/updateProfileImg.php",
                        method: "POST",
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (obj) {
                            if (obj == 1) {
                                // Exibe um pop-up de sucesso
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Imagem atualizada com sucesso!'
                                })

                                // Recarrega a página após 1 segundo
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                            // Limpa o valor do input após o upload
                            $(triggerInput).val("");
                        }
                    });
                } else {
                    // Caso ocorra um erro no upload, restaura a imagem anterior
                    $(holder).find(".pic").attr("src", currentImg);
                    $(wrapper).append(
                        '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> Houve um erro ao fazer o upload! Por favor, tente novamente mais tarde.</div>'
                    );

                    // Limpa o valor do input após o upload
                    $(triggerInput).val("");

                    // Remove o alerta de erro após 3 segundos
                    setTimeout(() => {
                        $(wrapper).find('[role="alert"]').remove();
                    }, 3000);
                }
            }, 1500);
        };
    } else {
        // Exibe um alerta de erro se o arquivo não for uma imagem
        $(wrapper).append(
            '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Por favor, escolha uma imagem válida.</div>'
        );

        // Remove o alerta de erro após 3 segundos
        setTimeout(() => {
            $(wrapper).find('role="alert"').remove();
        }, 3000);
    }
});

// Função para pesquisa
function pesquisar() {
    // Obtém o texto da barra de pesquisa
    const texto = $('#barra').val();

    // Redireciona para a página de anúncios com o texto de pesquisa como parâmetro
    window.location.href = "anuncios.php?pesquisar=" + texto;
}
