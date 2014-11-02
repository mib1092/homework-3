<? get_header();
/*
Template Name: FAQ
*/
?>

    <div id="content">

        <? if ( have_posts() ) : ?>
            <div class="about">
                <? while ( have_posts() ) : the_post(); ?>

                    <? the_title('<h2>', '</h2>'); ?>
                    <ul>
                        <li class="imgs"><? if (has_post_thumbnail() ) { the_post_thumbnail(); } ?></li>
                        <? remove_filter ('the_content', 'wpautop'); the_content(); ?>
                    </ul>

                <? endwhile; ?>
            </div>
        <? else: echo "<p>Страница не найдена...</p>" ?>
        <? endif; ?>

    </div><!-- content -->

<? get_footer(); ?>