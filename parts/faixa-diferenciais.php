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
                <div class="col-xs-12 col-sm-6 coluna-vazia">
               <?php $attachments = get_attached_media( 'image', $post->ID ); $i=0;?>
                    <div id="carousel-<?php print $c; ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php foreach($attachments as $attachment) :
                            $img_full = wp_get_attachment_url($attachment->ID);
                            $img = wp_get_attachment_image_src($attachment->ID, 'medium');
                            
                            if($img !== false) : ?>
                            <div class="carousel-item <?php echo ( $i > 0 ? '': 'active'); ?>">
                                <img class="d-block w-100" src="<?php echo $img[0]; ?>" alt="First slide">
                            </div>
                        <?php endif; $i++; endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 coluna-conteudo">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-1 p-4">
                        <?php the_title('<h3>', '</h3>'); ?>

                        <?php the_content(); ?>
                        </div>
                    </div>    
                </div>
            </div>

            <?php else: ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6 coluna-conteudo">
                    <div class="row">
                        <div class="col-sm-6 offset-md-2 p-4">
                        <?php the_title('<h3>', '</h3>'); ?>
                        <p>
                        <?php the_content(); ?>
                        </p>
                        
                        </div>
                    </div>    
                </div>
                <div class="col-xs-12 col-sm-6 coluna-vazia">
                    <?php $attachments = get_attached_media( 'image', $post->ID ); $i=0;?>
                    <div id="carousel-<?php print $c; ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php foreach($attachments as $attachment) :
                            $img_full = wp_get_attachment_url($attachment->ID);
                            $img = wp_get_attachment_image_src($attachment->ID, 'medium');
                            
                            if($img !== false) : ?>
                            <div class="carousel-item <?php echo ( $i > 0 ? '': 'active'); ?>">
                                <img class="d-block w-100" src="<?php echo $img[0]; ?>" alt="First slide">
                            </div>
                        <?php endif; $i++; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; $c++; ?>
        <?php wp_reset_query(); endwhile; ?>
    <?php endif; ?>


    </div>
</section>

