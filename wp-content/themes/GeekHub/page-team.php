<? get_header();
/*
Template Name: Team
*/
?>

    <div id="content">

        <? $lecturers = new WP_Query(array(
            'post_type' => 'lecturers',
            'posts_per_page' => -1,
            'orderby' => 'ID',
            'order' => 'ASC'
        ));
        if ( $lecturers->have_posts()) : ?>
            <div class="team">
                <? the_title('<h2>', '</h2>'); ?>
                <ul>
            <? while ( $lecturers->have_posts() ) : $lecturers->the_post(); ?>
                    <li>
                        <h3><? the_title(); ?> <span><?php echo (get_post_meta($post->ID, 'specialization', true)); ?></span></h3>
                        <? if (has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        <? the_content(); ?>
                    </li>
            <? endwhile; ?>
                </ul>
            </div>
        <? else: echo "<p>У команді нікого немає :)</p>" ?>
        <? endif; ?>

    </div><!-- content -->

<? get_footer(); ?>