<? get_header(); ?>

    <div id="content">

        <? if ( have_posts() ) : while ( have_posts() ) : the_post();

            the_title('<h2>', '</h2>');
            if (has_post_thumbnail() ) { the_post_thumbnail(); }
            the_content();

        endwhile; else:
        endif; ?>

    </div><!-- content -->

<? get_footer(); ?>