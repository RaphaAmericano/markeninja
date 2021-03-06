<?php 
//Diferencias
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
        'supports' => array('title', 'editor', 'author', 'thumbnail' )
    );
    register_post_type('diferenciais', $args);
}
add_action('init', 'diferenciais_post_type');

function diferenciais_meta_box(){
    add_meta_box('diferenciais', 'Imagem', 'diferenciais_meta_box_callback', 'diferenciais', 'normal');
}
add_action('add_meta_boxes', 'diferenciais_meta_box');

function diferenciais_meta_box_callback( $post ){

    wp_nonce_field('save_diferencial_data', 'diferencial_meta_box_nonce');
    $valor = get_post_meta( $post->ID, '_diferencial_value_key', true);

    echo '<input type="hidden" name="diferencial_field">';
    echo '<button type="button" id="upload-buttom">Upload</button>';
    //echo image_uploader_field('diferencial_field', $valor);
}

function save_diferencial_data( $post_id ){
    if(!isset( $_POST['diferencial_meta_box_nonce'])){
        return;
    }
    if(!wp_verify_nonce( $_POST['diferencial_meta_box_nonce'], 'save_diferencial_data')){
        return;
    }
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return;
    }
    if(!current_user_can('edit_post', $post_id)){
        return;
    }
    if(!isset($_POST['diferencial_field'])){
        return;
    }

    $data = sanitize_text_field($_POST['diferencial_field']);
    update_post_meta( $post_id, '_diferencial_value_key', $data);
}

add_action('save_post', 'save_diferencial_data');

//Parceiros

function parceiros_post_type(){
    $labels = array(
        'name' => "Pareceiros",
        'singular_name' => "Parceiro",
        'menu_name' => 'Parceiros',
        'name_admin_bar' => 'Parceiro'
    );

    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'author', 'thumbnail' )
    );
    register_post_type('parceiros', $args);
}
add_action('init', 'parceiros_post_type');

//Serviços 

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
        'menu_position' => 10,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'author', 'thumbnail')
    );
    register_post_type('servicos', $args);
}
add_action('init', 'servicos_post_type');

function servico_add_meta_box(){
    add_meta_box('preco', 'Preço', 'preco_meta_box_callback', 'servicos', 'side');
}

function preco_meta_box_callback( $post ){
    wp_nonce_field('save_preco_data', 'preco_meta_box_nonce');

    $valor = get_post_meta( $post->ID, '_preco_value_key', true);

    echo '<label for="preco_field">R$: </label>';
	echo '<input type="number" id="preco_field" name="preco_field" value="' . esc_attr( $valor ) . '" size="25" />';
}

function save_preco_data( $post_id ){
    if(!isset( $_POST['preco_meta_box_nonce'])){
        return;
    }
    if(!wp_verify_nonce( $_POST['preco_meta_box_nonce'], 'save_preco_data')){
        return;
    }
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
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

add_filter('manage_servicos_posts_columns', 'servicos_coluna_admin');
function servicos_coluna_admin($columns){   
    $columns['preco'] = "Preço (R$)";
    return $columns;
}

add_action('manage_servicos_posts_custom_column', 'servico_custom_coluna', 10, 2);
function servico_custom_coluna( $column, $post_id){

    switch($column){
        case 'preco':
        $preco = get_post_meta($post_id, '_preco_value_key', true);
        echo '<span>'.$preco.'</span>';
        break;
    }
    
}

?>