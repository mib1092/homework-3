<? get_header(); ?>

    <div id="content">
        <div class="home">

        <? $courses = new WP_Query(array(
            'post_type' => 'courses',
            'posts_per_page' => -1,
            'orderby' => 'ID',
            'order' => 'ASC'
        ));
        if ( $courses->have_posts()) : ?>
            <h2>ДЕТАЛІ КУРСІВ ТА РЕЄСТРАЦІЯ</h2>
            <ul class="types">
            <? while ( $courses->have_posts() ) : $courses->the_post();
            $directions = get_the_terms( $post->ID, 'educational-direction' );
            if ( !empty( $directions ) ){
                $direction = array_shift( $directions ); } ?>
                <li>
                    <? if (has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <a class="title" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    <p><? echo $direction->description; ?></p>
                    <a href="<?php the_permalink(); ?>">Докладніше + реєстрація</a>
                </li>
            <? endwhile; ?>
            </ul>
        <? else : endif; wp_reset_query(); ?>

            <? get_sidebar(); ?>
        </div>
    </div><!-- content -->

<? get_footer(); ?>