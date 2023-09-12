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


const handlePhone = (event) => {
  let input = event.target;
  input.value = phoneMask(input.value);
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'');
  value = value.replace(/(\d{2})(\d)/,"($1) $2");
  value = value.replace(/(\d)(\d{4})$/,"$1-$2");
  return value;
}

function verificarSenha(senha, id){
  $.ajax({
    url: "../config/verificarSenha.php",
    method: "POST",
    data: {
      senha: senha,
      id: id
    },
    success: function(obj){
      if(obj == '1'){
        Swal.fire({
          icon: 'success',
          title: 'Pronto',
          text: 'Agora você pode atualizar sua senha',
        })
        $("#colocarNovaSenha").removeAttr("readonly");
        $("#repetirNovaSenha").removeAttr("readonly");
        $("#colocarNovaSenha").focus();
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Eita...😬',
          text: 'Senha incorreta!',
      })
      }
  
    }
  })
}

function verificaNovaSenha(){
  const senha = $("#repetirNovaSenha").val();
  const senhaR = $("#colocarNovaSenha").val();

  if(senha !== senhaR){
    Swal.fire({
      icon: 'error',
      title: 'Eita...😬',
      text: 'As novas senhas não são iguais!',
    })
  }
  if(senha.length < 6){
    Swal.fire(
      'Aviso',
      'A senha não contem 6 caracteres',
      'info'
    )
    return false;
  }
  return true
}

