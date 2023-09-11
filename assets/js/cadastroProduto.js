const urlParams = new URLSearchParams(window.location.search);

const estadoCadastroProduto = urlParams.get('estadoCadastroProduto');

if(estadoCadastro == 1) {
    Swal.fire(
        'success',
        'Sucesso',
        'O produto foi cadastrado!',
      )
}

if(estadoCadastro == 5){
  Swal.fire({
    icon: 'error',
    title: 'Eita...😬',
    text: 'Houve um erro ao cadastrar o produto!',
  })
}