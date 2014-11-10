<?php get_header();
/*
Template Name: Team
*/
?>

    <div id="content">

        <?php $lecturers = new WP_Query(array(
            'post_type' => 'lecturers',
            'posts_per_page' => -1,
            'orderby' => 'ID',
            'order' => 'ASC'
        ));
        if ( $lecturers->have_posts()) : ?>
            <div class="team">
                <?php the_title('<h2>', '</h2>'); ?>
                <ul>
            <?php while ( $lecturers->have_posts() ) : $lecturers->the_post(); ?>
                    <li>
                        <h3><?php the_title(); ?> <span><?php echo (get_post_meta($post->ID, 'specialization', true)); ?></span></h3>
                        <?php if (has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        <?php the_content(); ?>
                    </li>
            <?php endwhile; ?>
                </ul>
            </div>
        <?php else: echo "<p>У команді нікого немає :)</p>" ?>
        <?php endif; ?>

    </div><!-- content -->

<?php get_footer(); ?>