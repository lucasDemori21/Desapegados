// Obtém o parâmetro 'estadoCadastro' da URL
const urlParams = new URLSearchParams(window.location.search);
const estadoCadastro = urlParams.get('estadoCadastro');

// Exibe uma mensagem de erro se 'estadoCadastro' for igual a 4
if (estadoCadastro == 4) {
  Swal.fire({
    icon: 'error',
    title: 'Eita...😬',
    text: 'Esse email já foi cadastrado!',
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

// Função para formatar números de telefone enquanto o usuário digita
const handlePhone = (event) => {
  let input = event.target;
  input.value = phoneMask(input.value);
}

// Função para aplicar uma máscara a números de telefone
const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{2})(\d)/, "($1) $2");
  value = value.replace(/(\d)(\d{4})$/, "$1-$2");
  return value;
}

// Função para formatar CPF enquanto o usuário digita
const handleCpf = (event) => {
  let input = event.target;
  input.value = cpfMask(input.value);
}

// Função para aplicar uma máscara a números de CPF
const cpfMask = (value) => {
  if (!value) return "";
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{3})(\d)/, "$1.$2");
  value = value.replace(/(\d{3})(\d)/, "$1.$2");
  value = value.replace(/(\d{3})(\d{2})$/, "$1-$2");
  return value;
}

// Função para aplicar uma máscara a números de CEP
const cepInput = document.getElementById('id_cep');
cepInput.addEventListener('input', () => {
  let value = cepInput.value;
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{5})(\d)/, '$1-$2');
  cepInput.value = value;
});

// Listener de evento para buscar informações de endereço com base no CEP
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

// Função para calcular a idade com base na data de nascimento
function calculaIdade() {
  d = document.getElementById('id_datanasc').valueAsDate;
  const ano = d.getUTCFullYear();
  const dataAtual = new Date();
  const anoAtual = dataAtual.getFullYear();
  const result = (anoAtual - ano);
  if ((result > 100) || (result < 18)) {
    // Exibe um pop-up de aviso se a idade não estiver dentro do intervalo permitido
    Swal.fire({
      title: 'IDADE INVÁLIDA',
      text: 'APENAS MAIORES DE 18 ANOS ATÉ 100 ANOS!',
      icon: 'warning',
      timer: 0
    });
    document.getElementById("id_datanasc").value = "";
    document.getElementById("id_datanasc").focus();
  } else {
    // Define o valor da idade no campo de idade
    document.getElementById("idade").value = result;
  }
}

// Função para validar o comprimento da senha
function validatePasswordLength() {
  let password = document.getElementById("id_senha").value;
  if (password.length < 6) {
    // Exibe um pop-up de aviso se a senha não contiver 6 caracteres
    Swal.fire(
      'Aviso',
      'A senha não contém 6 caracteres',
      'info'
    )
    return false;
  }
  return true;
}

// Função para validar se as senhas coincidem
function validatePasswords() {
  let firstPassword = document.getElementById("id_senha").value;
  let secondPassword = document.getElementById("rep_senha").value;

  if (firstPassword == secondPassword) {
    return true;
  } else {
    // Exibe um pop-up de erro se as senhas forem diferentes
    Swal.fire({
      icon: 'error',
      title: 'Eita...😬',
      text: 'As senhas são diferentes',
    })
    return false;
  }
}
