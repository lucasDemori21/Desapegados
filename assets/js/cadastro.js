const urlParams = new URLSearchParams(window.location.search);
const estadoCadastro = urlParams.get('estadoCadastro');

if(estadoCadastro == 4){
  Swal.fire({
    icon: 'error',
    title: 'Eita...😬',
    text: 'Esse email já foi cadastrado!',
  })
}
if(estadoCadastro == 5) {
  Swal.fire({
    icon: 'error',
    title: 'Eita...😬',
    text: 'Houve um erro no cadastro',
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

 const handleCpf = (event) => {
   let input = event.target;
   input.value = cpfMask(input.value);
 }

 const cpfMask = (value) => {
   if(!value) return "";
   value = value.replace(/\D/g, '');
   value = value.replace(/(\d{3})(\d)/, "$1.$2");
   value = value.replace(/(\d{3})(\d)/, "$1.$2");
   value = value.replace(/(\d{3})(\d{2})$/, "$1-$2");
   return value;
 }

 const cepInput = document.getElementById('id_cep');

 cepInput.addEventListener('input', () => {
  let value = cepInput.value;
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{5})(\d)/, '$1-$2');
  cepInput.value = value;
});

const inputCep = document.getElementById('id_cep');
inputCep.addEventListener('input', () => {
  const cep = inputCep.value.replace(/\D/g, '');
  if (cep.length === 8) {
    const url = `https://viacep.com.br/ws/${cep}/json/`;
    fetch(url)
      .then(response => response.json())
      .then(data => {
        document.getElementById('id_logradouro').value = data.logradouro;
        document.getElementById('id_bairro').value = data.bairro;
        document.getElementById('id_cidade').value = data.localidade;
        document.getElementById('id_estado').value = data.uf;
        document.getElementById('id_logradouro').readonly = true;
        document.getElementById('id_bairro').readonly = true;
        document.getElementById('id_cidade').readonly = true;
        document.getElementById('id_estado').readonly = true;

      })
      .catch(error => {
        console.log('Erro');
        console.log(error);
      });
  }
});

 function validatePasswordLength() {
  let password = document.getElementById("id_senha").value;
    if(password.length < 6){
      Swal.fire(
        'Aviso',
        'A senha não contem 6 caracteres',
        'info'
      )
      return false;
    }

    return true
 }

 function validatePasswords() {
    let firstPassword = document.getElementById("id_senha").value;
    let secondPassword = document.getElementById("rep_senha").value;

    if(firstPassword == secondPassword) {
      return true;
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Eita...😬',
        text: 'As senhas são diferentes',
      })
      return false
    }
 }