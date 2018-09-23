(function($){
    $icones = $(".parceiros a");
    $conteudo = $('.pareceiros-conteudo');
    $icones.on('click', function(e){
        var alvo = $(this).attr("href").replace('#', '');
        var $hidde = $('.parceiros-conteudo.hidden');
        for(var i =0; i < $conteudo.length; i++  ){
            if($conteudo[i].classList.contains('hidden') == false){
                $conteudo[i].classList.add('hidden');
            }
        }
        $('#'+alvo).removeClass('hidden');
    });
}( jQuery ));