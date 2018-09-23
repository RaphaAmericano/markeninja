<?php 
function theme_enqueue(){
    wp_enqueue_style('main', get_template_directory_uri().'/css/style.css', array(), time(), 'all'); //trocar time em producao
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_style('fontawesome', get_template_directory_uri().'/node_modules/@fortawesome/fontawesome-free/css/all.min.css', array(), '5.3.1', 'all');
    
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '4.1.3',  false );
    wp_enqueue_script('main', get_template_directory_uri().'/index.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue');

function theme_admin_enqueue(){
   
    wp_enqueue_media();
    
    wp_enqueue_script('admin', get_template_directory_uri().'/admin.js', array('jquery'), '1.0.0',  false );
}
add_action('admin_enqueue_scripts', 'theme_admin_enqueue');
?>