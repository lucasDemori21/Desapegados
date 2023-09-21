$(document).ready(function (e) {
    // Ouvinte de evento para quando um item no dropdown de pesquisa é clicado
    $('.search-panel .dropdown-menu').find('a').click(function (e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#", "");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });

    // Ouvinte de evento para quando uma tecla é pressionada no primeiro link <a> encontrado
    var a = document.getElementsByTagName('a')[0];
    $(a).on('keyup', function (evt) {
        console.log(evt);
        if (evt.keycode === 13) {
            alert('search?');
        }
    });
});
