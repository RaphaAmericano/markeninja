
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php print get_bloginfo("name"); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<nav class="navbar nav-transparent">
  <a class="navbar-brand" href="<?php print bloginfo('url'); ?>">
    <?php if(get_custom_logo()): ?>
    <img src="<?php print get_custom_logo(); ?>">
    <?php else: ?>
    <img src="<?php print get_template_directory_uri().'/img/logo.png'; ?>" >
    <?php endif; ?>
  </a>
</nav>
<div class="container-fluid banner">
    <div class="row">
        <div class="col col-xs-auto col-xs-8 col-md-4 offset-md-2">
            <h1 class="text-uppercase">Transporte turístico</h1>
            <p>Transportar com Conforto, Segurança, Descrição, Estilo e Elegância</p>
        </div>
    </div>
</div>