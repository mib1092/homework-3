<? get_header(); ?>

<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!-- post -->
<? endwhile; ?>
    <!-- post navigation -->
<? else: ?>
    <!-- no posts found -->
<? endif; ?>

<? get_footer(); ?>