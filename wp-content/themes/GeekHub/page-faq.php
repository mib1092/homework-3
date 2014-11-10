<?php get_header();
/*
Template Name: FAQ
*/
?>

    <div id="content">

        <?php if ( have_posts() ) : ?>
            <div class="about">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php the_title('<h2>', '</h2>'); ?>
                    <ul>
                        <li class="imgs"><?php if (has_post_thumbnail() ) { the_post_thumbnail(); } ?></li>
                        <?php remove_filter ('the_content', 'wpautop'); the_content(); ?>
                    </ul>

                <?php endwhile; ?>
            </div>
        <?php else: echo "<p>Страница не найдена...</p>" ?>
        <?php endif; ?>

    </div><!-- content -->

<?php get_footer(); ?>