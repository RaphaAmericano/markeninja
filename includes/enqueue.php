<?php 
function theme_enqueue(){
    wp_enqueue_style('main', get_template_directory_uri().'/css/style.css', array(), time(), 'all'); //trocar time em producao
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_style('fontawesome', get_template_directory_uri().'/node_modules/@fortawesome/fontawesome-free/css/all.mim.css', array(), '5.3.1', 'all');
    
}
add_action('wp_enqueue_scripts', 'theme_enqueue');
?>