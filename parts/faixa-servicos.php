<?php 
$loop_servicos = new WP_Query( 
    array(
        'post_type' => 'servicos',
        'post_status' => 'publish',
        'posts_per_page' => 3
    )
);
?>

<?php if($loop_servicos->have_posts() ): ?>
<section class="container servicos">
    <div class="row">
        <div class="col">
            <h2 class="text-uppercase text-center">Nossos Servicos</h2>
            <p>Confira nossas soluções em transporte de alto padrão tais como: Aluguel de carros de luxo, locação de automóveis blindados, transporte executivo com motorista bilíngüe, carros para turistas corporativo e negócios, translado para hotéis e aos principais aeroportos do Rio de Janeiro.</p>
        </div>
    </div>
    <div class="row">

        <?php while($loop_servicos->have_posts() ): $loop_servicos->the_post(); $preco = get_post_meta( get_the_ID(), '_preco_value_key', true ); ?>

        <div class="col-sm-4 col-xs-12 conteudo-servico">
            <img src="" alt="" class="img-thumbnail">
            <p><?php the_content(); ?></p>
            <span class="text-uppercase preco font-weight-bold">A partir de: R$ <?php print $preco; ?></span>
        </div>
        <?php endwhile; wp_reset_query();?>
    </div>
</section>
<?php endif; ?>