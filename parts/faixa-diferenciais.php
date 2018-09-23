<?php 
$loop_diferenciais = new WP_Query( 
    array(
        'post_type' => 'diferenciais',
        'post_status' => 'publish',
        'posts_per_page' => 2
    )
);
?>
<section class="container-fluid diferenciais">
    
    <?php if($loop_diferenciais->have_posts()): $c = 0; ?>
        <?php while($loop_diferenciais->have_posts()): $loop_diferenciais->the_post(); ?>
            <?php if($c % 2 == 0 ): ?>
            <div class="row">
                <div class="col-md-6 coluna-vazia">
                    
                </div>
                <div class="col-6 coluna-conteudo">
                    <div class="row">
                        <div class="col-md-8 offset-md-1">
                        <?php the_title('<h3>', '</h3>'); ?>

                        <?php the_content(); ?>
                        </div>
                    </div>    
                </div>
            </div>

            <?php else: ?>
            <div class="row">
                <div class="col-6 coluna-conteudo">
                    <div class="row">
                        <div class="col-md-6 offset-md-2">
                        <?php the_title('<h3>', '</h3>'); ?>

                        <?php the_content(); ?>
                        </div>
                    </div>    
                </div>
                <div class="col-6 coluna-vazia">
                    
                </div>
            </div>
            <?php endif; $c++; ?>
        <?php wp_reset_query(); endwhile; ?>
    <?php endif; ?>


    </div>
</section>

