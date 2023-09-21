// Obtém o parâmetro 'estadoCadastro' da URL
const urlParams = new URLSearchParams(window.location.search);
const estadoCadastro = urlParams.get('estadoCadastro');

// Exibe uma mensagem de sucesso se 'estadoCadastro' for igual a 1
if (estadoCadastro == 1) {
    Swal.fire({
        icon: 'success',
        title: 'Produto cadastrado com sucesso!'
    })
}

// Exibe uma mensagem de erro se 'estadoCadastro' for igual a 5
if (estadoCadastro == 5) {
    Swal.fire({
        icon: 'error',
        title: 'Eita...😬',
        text: 'Houve um erro no cadastro',
    })
}

// Event listener para o campo de input de arquivo com ID 'fileUpload'
$("#fileUpload").on('change', function () {
    // Obtém a contagem de arquivos selecionados
    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image-holder");
    image_holder.empty();

    // Verifica se a extensão do arquivo é uma imagem válida
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
