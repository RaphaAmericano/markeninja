<?php 
function diferenciais_post_type(){
    $labels = array(
        'name' => "Diferencias",
        'singular_name' => "Diferencial",
        'menu_name' => 'Diferenciais',
        'name_admin_bar' => 'Diferencial'
    );

    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-welcome-add-page',
        'supports' => array('title', 'editor', 'author')
    );
    register_post_type('diferenciais', $args);
}
add_action('init', 'diferenciais_post_type');

function servicos_post_type(){
    $labels = array(
        'name' => "Serviços",
        'singular_name' => "Serviço",
        'menu_name' => 'Serviços',
        'name_admin_bar' => 'Serviço'
    );

    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'author')
    );
    register_post_type('servicos', $args);
}
add_action('init', 'servicos_post_type');

function servico_add_meta_box(){
    add_meta_box('preco', 'Preço', 'preco_meta_box_callback', 'markeninja', 'side');
}

function preco_meta_box_callback( $post ){
    wp_nonce_field('save_preco_data', 'preco_meta_box_nonce');

    $valor = get_post_meta( $post->ID, '_preco_value_key', true);

    echo '<label for="preco_field">User Email Address: </label>';
	echo '<input type="email" id="preco_field" name="preco_field" value="' . esc_attr( $valor ) . '" size="25" />';
}

function save_preco_data(){
    if(!isset( $_POST['preco_meta_box_nonce'])){
        return;
    }
    if(wp_verify_nonce( $_POST['preco_meta_box_nonce'], 'save_preco_data')){
        return;
    }
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }
    if(!current_user_can('edit_post', $post_id)){
        return;
    }
    if(!isset($_POST['preco_field'])){
        return;
    }

    $data = sanitize_text_field($_POST['preco_field']);
    update_post_meta( $post_id, '_preco_value_key', $data);
}

add_action('add_meta_boxes','servico_add_meta_box');
add_action('save_post', 'save_preco_data');

function servicos_coluna_admin($columns){
    $novasColunas = array();
    $novasColunas['preco'] = "Preço";
    return $novaColunas;
}

function servico_custom_coluna( $column, $post_id){
    $preco = get_post_meta($post_id, '_preco_value_key', true);
    echo '<span>'.$preco.'</span>';
}


add_filter('manage_markeninja_posts_columns', 'servicos_coluna_admin');
add_action('manage_markeninja_posts_custom_column', 'servico_custom_coluna', 10, 2);




?>