<div class="sidebar">

<? $courses = new WP_Query(array(
    'post_type' => 'courses',
    'posts_per_page' => -1,
    'orderby' => 'ID',
    'order' => 'ASC'
));
if ( $courses->have_posts()) : ?>
    <h3>НАШІ КУРСИ</h3>
    <ul>
    <? while ( $courses->have_posts() ) : $courses->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <? endwhile; ?>
    </ul>
<? else : endif; wp_reset_query(); ?>

</div>