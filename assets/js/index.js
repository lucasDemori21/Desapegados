const urlParams = new URLSearchParams(window.location.search);
const logins = urlParams.get('login');

if(logins == '3'){
    Swal.fire({
        icon: 'success',
        title: 'Sucesso',
        text: 'Você está logado!',
    })
}