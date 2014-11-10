<?php get_header(); ?>

    <div id="content">

    <?php if ( have_posts() ) : ?>
        <div class="about">
        <?php while ( have_posts() ) : the_post(); ?>

            <?php the_title('<h2>', '</h2>'); ?>
            <?php if (has_post_thumbnail() ) {
                the_post_thumbnail(); } ?>
            <?php the_content (); ?>

    <?php endwhile; ?>
        </div>
    <?php else: echo "<p>Страница не найдена...</p>" ?>
    <?php endif; ?>

    </div><!-- content -->

<?php get_footer(); ?>