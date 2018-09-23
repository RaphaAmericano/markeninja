<?php 
$loop_diferencias = new WP_Query($args);
$args = array(
    'posts_per_page' => 3,
    'post_type' => 'diferencias',
    'orderby' => 'menu_order'
); ?>

<?php if($loop_diferencias->have_posts()):  ?>
    <?php while($loop_diferencias->have_posts()): the_post(); ?>
        <?php the_title(); ?>

        <?php the_content(); ?>
    <?php endwhile; ?>
<?php endif; ?>
