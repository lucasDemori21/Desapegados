// Ouvinte de evento para o campo de input de arquivo com ID 'fileUpload'
$("#fileUpload").on('change', function () {
    // Obter a contagem de arquivos selecionados
    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image-holder");
    image_holder.empty();

    // Verificar se a extensão do arquivo é uma imagem válida
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {

            // Loop para cada arquivo selecionado para upload
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
            alert("Este navegador não suporta FileReader.");
        }
    } else {
        alert("Por favor, selecione apenas imagens.");
    }
});

// Função para atualizar um anúncio com base na resposta
function atualizarAnuncio(response) {
    const escolha = response;
    const id_anuncio = $("#id_anuncio").val();

    // Verificar o valor da resposta para exibir o pop-up apropriado
    if (response == 1) {
        // Pop-up de confirmação para marcar como doado
        Swal.fire({
            title: 'Tem certeza que deseja marcar como doado?',
            text: "Isso não poderá ser reversível!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, doar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                executarEscolha(id_anuncio, escolha);
            } else {
                return false;
            }
        })
    } if (response == 2) {
        // Pop-up de confirmação para salvar alterações
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
        // Pop-up de confirmação para excluir anúncio
        Swal.fire({
            title: 'Tem certeza que deseja excluir este anúncio?',
            text: "Isso não poderá ser reversível!",
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

// Função para executar a escolha (doação, atualização, exclusão) do anúncio
function executarEscolha(id_anuncio, escolha) {
    const titulo = $('#tituloAnuncio').val();
    const categoria = $('#categoria').val();
    const descricao = $('#descricao').val();
    const id_user = $('#id_usuario').val();
    const imgs = $('#img_name').val();

    // Obter o elemento de input de arquivo
    const fileUpload = $('#fileUpload')[0];
    const formData = new FormData();

    // Adicionar os valores aos dados do formulário
    formData.append('escolha', escolha);
    formData.append('id_anuncio', id_anuncio);
    formData.append('id_user', id_user);
    formData.append('tituloAnuncio', titulo);
    formData.append('descricao', descricao);
    formData.append('categoria', categoria);
    formData.append('img_name', imgs);

    // Obter a lista de arquivos selecionados
    const files = fileUpload.files;

    // Adicionar cada arquivo ao FormData individualmente
    for (let i = 0; i < files.length; i++) {
        formData.append('fileUpload[]', files[i]);
    }

    $.ajax({
        url: "../config/updateAnuncio.php",
        method: "POST",
        data: formData, // Usar o FormData para enviar os arquivos
        contentType: false, // Definir como falso para que o jQuery configure o Content-Type corretamente
        processData: false, // Definir como falso para que o jQuery não processe os dados
        success: function (obj) {
            // Lidar com a resposta do servidor
            if (obj == 1) {
                // Pop-up de sucesso para marcar como doado
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Você marcou seu produto como doado!',
                })
            }
            if (obj == 2) {
                // Pop-up de sucesso para atualização de informações
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Informações atualizadas!',
                })
                setTimeout(() => {
                    location.reload();
                }, 1000)
            }
            if (obj == 3) {
                // Pop-up de sucesso para exclusão de anúncio
                Swal.fire(
                    'success',
                    'Sucesso',
                    'Seu anúncio foi excluído!',
                )
                setTimeout(() => {
                    window.location.href = "anunciosUsuario.php";
                }, 1000)
            }
        },
        error: function () {
            // Lidar com erros, se necessário
        }
    });
}
