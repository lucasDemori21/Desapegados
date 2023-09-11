const estadoPerfil = new URLSearchParams('estadoPerfil');

if(estadoPerfil == 1) {
    Swal.fire(
        'success',
        'Sucesso',
        'O perfil foi editado!',
      )
}

if (estadoProduto == 6) {
    Swal.fire({
        icon: 'error',
        title: 'Eita...😬',
        text: 'Houve um erro ao editar o perfil!',
      })
}