<? get_header(); ?>

    <div id="content">

    <? if ( have_posts() ) : ?>
        <div class="about">
        <? while ( have_posts() ) : the_post(); ?>

            <? the_title('<h2>', '</h2>'); ?>
            <? if (has_post_thumbnail() ) {
                the_post_thumbnail(); } ?>
            <? the_content (); ?>

    <? endwhile; ?>
        </div>
    <? else: echo "<p>Страница не найдена...</p>" ?>
    <? endif; ?>

    </div><!-- content -->

<? get_footer(); ?>