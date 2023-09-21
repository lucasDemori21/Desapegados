$(document).on("change", ".uploadProfileInput", function () {
    var triggerInput = this;
    var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
    var holder = $(this).closest(".pic-holder");
    var wrapper = $(this).closest(".profile-pic-wrapper");
    $(wrapper).find('[role="alert"]').remove();
    triggerInput.blur();
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) {
        return;
    }
    if (/^image/.test(files[0].type)) {
        // only image file
        var reader = new FileReader(); // instance of the FileReader
        reader.readAsDataURL(files[0]); // read the local file

        reader.onloadend = function () {
            $(holder).addClass("uploadInProgress");
            $(holder).find(".pic").attr("src", this.result);
            $(holder).append(
                '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
            );

            // Dummy timeout; call API or AJAX below
            setTimeout(() => {
                $(holder).removeClass("uploadInProgress");
                $(holder).find(".upload-loader").remove();
                // If upload successful
                if (Math.random() < 0.9) {


                    const fileInput = document.querySelector('#newProfilePhoto'); // Selecione o elemento input do arquivo
                    const img = fileInput.files[0]; // Obtenha o arquivo selecionado
                    const id = $('#id_user').val();
                    const img_profile = $('#img_profile').val();
                    const formData = new FormData(); // Crie um objeto FormData
                    formData.append('new_img', img);
                    formData.append('id', id);
                    formData.append('img_profile', img_profile)

                    $.ajax({
                        url: "../config/updateProfileImg.php",
                        method: "POST",
                        processData: false, // Não processe os dados
                        contentType: false, // Não defina o tipo de conteúdo
                        data: formData,
                        success: function (obj) {
                            if(obj == 1){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Imagem atualizada com sucesso!'
                                })
                                setTimeout(() => {
                                    location.reload();
                                },1000);
                            }
                            // Limpa input depois do upload
                            $(triggerInput).val("");
                        }
                    })

                } else {
                    $(holder).find(".pic").attr("src", currentImg);
                    $(wrapper).append(
                        '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                    );

                    // Clear input after upload
                    $(triggerInput).val("");
                    setTimeout(() => {
                        $(wrapper).find('[role="alert"]').remove();
                    }, 3000);
                }
            }, 1500);
        };
    } else {
        $(wrapper).append(
            '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
        );
        setTimeout(() => {
            $(wrapper).find('role="alert"').remove();
        }, 3000);
    }
});

function pesquisar(){
    const texto = $('#barra').val();
    window.location.href = "anuncios.php?pesquisar"+texto;
}
