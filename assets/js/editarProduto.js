const estadoProduto = new URLSearchParams('estadoProduto');

if(estadoProduto == 1) {
    Swal.fire(
        'success',
        'Sucesso',
        'O produto foi editado!',
    )
}

// Ao clicar no botão de excluir produto
if(estadoProduto == 7) {
    Swal.fire({
        title: 'Você deseja excluir o produto?',
        text: "Não será possível reverter essa ação!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deletar'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deletado!',
            'Seu produto foi deletado.',
            'success'
          )
        }
      })
}

if (estadoProduto == 6) {
    Swal.fire({
        icon: 'error',
        title: 'Eita...😬',
        text: 'Houve um erro ao editar o produto!',
      })
}

document.getElementById("imagemPrincipal").addEventListener("change", function() {
    var input = this;
    if (input.value.length > 0) {
        var fileReader = new FileReader();
        fileReader.onload = function(data) {
            document.querySelector(`#PreviewPrincipal`).src = data.target.result;
        };
        fileReader.readAsDataURL(input.files[0]);
    }
});

document.getElementById("imagem1").addEventListener("change", function() {
    var input = this;
    if (input.value.length > 0) {
        var fileReader = new FileReader();
        fileReader.onload = function(data) {
            document.querySelector(`#Preview1`).src = data.target.result;
        };
        fileReader.readAsDataURL(input.files[0]);
    }
});

document.getElementById("imagem2").addEventListener("change", function() {
    var input = this;
    if (input.value.length > 0) {
        var fileReader = new FileReader();
        fileReader.onload = function(data) {
            document.querySelector(`#Preview2`).src = data.target.result;
        };
        fileReader.readAsDataURL(input.files[0]);
    }
});

document.getElementById("imagem3").addEventListener("change", function() {
    var input = this;
    if (input.value.length > 0) {
        var fileReader = new FileReader();
        fileReader.onload = function(data) {
            document.querySelector(`#Preview3`).src = data.target.result;
        };
        fileReader.readAsDataURL(input.files[0]);
    }
});

document.getElementById("imagem4").addEventListener("change", function() {
    var input = this;
    if (input.value.length > 0) {
        var fileReader = new FileReader();
        fileReader.onload = function(data) {
            document.querySelector(`#Preview4`).src = data.target.result;
        };
        fileReader.readAsDataURL(input.files[0]);
    }
});


function aceitarDoacao(response){
    if(response == 1){
        $.ajax({
            url: "../../config/processa_produto.php",
            method: "POST",
            data: {
                response: response
            },
        })
    }else if (response == 3){
        $.ajax({
            url: "../../config/deleta_produto.php",
            method: "POST",
            data: {
                response: response
            },
        })
    }
}




