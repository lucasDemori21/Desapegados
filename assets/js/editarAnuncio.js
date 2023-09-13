$("#fileUpload").on('change', function () {

    //Get count of selected files
    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image-holder");
    image_holder.empty();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {

            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                    }).appendTo(image_holder);
                }

                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }

        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
});

function atualizarAnuncio(response) {
    const escolha = response;
    const id_anuncio = $("#id_anuncio").val();
    if (response == 1) {
        Swal.fire({
            title: 'Tem certeza que deseja marcar como doado?',
            text: "Isso não poderá ser reversivel!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, doar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                executarEscolha(id_user, escolha);
            } else {
                return false;
            }
        })
    } if (response == 2) {
        Swal.fire({
            title: 'Tem certeza que deseja salvar essas alterações?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, alterar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                executarEscolha(id_anuncio, escolha);
            } else {
                return false;
            }
        })
    } if (response == 3) {
        Swal.fire({
            title: 'Tem certeza que deseja excluir este anúncio?',
            text: "Isso não poderá ser reversivel!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                executarEscolha(id_anuncio, escolha);
            } else {
                return false;
            }
        })
    }
}

function executarEscolha(id_anuncio, escolha){
    const titulo = $('#tituloAnuncio').val();
    const categoria= $('#categoria').val();
    const descricao= $('#descricao').val();
    const fileUpload = $('#fileUpload').val();
    const id_user = $('#id_usuario').val();
    const imgs = $('#img_name').val();
    $.ajax({
        url: "../config/updateAnuncio.php",
        method: "POST",
        data: {
            escolha: escolha,
            id_anuncio: id_anuncio,
            id_user: id_user,
            tituto: titulo,
            descricao: descricao,
            categoria: categoria,
            fileUpload: fileUpload,
            imgs: imgs
        },
        success: function (obj) {
            if (obj == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Você marcou seu produto como doado!',
                })
            }
            if (obj == 2) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Informações atualizadas!',
                })
            }
            if (obj == 3) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Seu anúncio foi excluído!',
                })
            }
        }
    })
}
    