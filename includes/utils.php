<?php 
function image_uploader_field( $nome, $valor = ''){
    $image = ' button">Uploade image';
    $image_size = 'full';
    $display = 'none';

    if( $image_attributes = wp_get_attachment_image_src($valor, $image_size)){

        $image = '><img src="' . $image_attributes[0] . '" style="max-width: 95%; display:block;" />';
        $display = 'inline-block';
    }
    return '
        <div>
        <a href="#" class="botao_upload' . $image . '</a>
        <input type="hidden" name="' . $nome . '" id="' . $nome . '" value="' . $valor . '" />
        <a href="#" class="botao_remover" style="display:inline-block;display:' . $display . '">Remove image</a>
    </div>';
}

function remove_images( $content ) {
   $postOutput = preg_replace('/<img[^>]+./','', $content);
    return $postOutput;
}

add_filter( 'the_content', 'remove_images', 100 );


?>