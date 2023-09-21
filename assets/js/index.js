/**
 * Função para realizar uma pesquisa.
 */
function pesquisar() {
    // Obtém o texto da barra de pesquisa
    const texto = $('#barra').val();
    // Redireciona para a página de anúncios com o texto de pesquisa como parâmetro
    window.location.href = "pages/anuncios.php?pesquisar=" + texto;
}