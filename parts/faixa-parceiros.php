<?php 
$loop_parceiros = new WP_Query( 
    array(
        'post_type' => 'parceiros',
        'post_status' => 'publish',
        'posts_per_page' => 4
    )
);
if($loop_parceiros->have_posts()): $c = 0; $k = 0; $hidden = '';
?>

<section class="container parceiros">
    <div class="row">
        <div class="col">
            <h2 class="text-uppercase">Nossos parceiros</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <?php while($loop_parceiros->have_posts()): $loop_parceiros->the_post();?>
                    <div class="col-6">
                        <a href="#post-<?php print $c;  ?>">
                            <img src="<?php print the_post_thumbnail_url(); ?>" alt="" class="img-thumbnail">   
                        </a>
                    </div>
                <?php $c++; endwhile; wp_reset_query()?>
            </div>
        </div>
        <div class="col conteudo">
            <?php while($loop_parceiros->have_posts()): $loop_parceiros->the_post(); ?>
            <?php if($k > 0 ){ $hidden = 'hidden'; } ?>
                <div id="post-<?php print $k;  ?>" class="pareceiros-conteudo <?php print $hidden; ?>"><?php the_content(); ?><a href="#"><?php the_title() ?></a></div>
            <?php $k++; endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
