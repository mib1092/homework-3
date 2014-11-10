<?php $directions = get_the_terms( $post->ID, 'educational-direction' );
    if ( !empty( $directions ) ){
        $direction = array_shift( $directions );
    } ?>
<?php get_header(); ?>

    <div id="content">

    <?php if ( have_posts() ) : ?>
        <?php get_sidebar('courses'); ?>
        <div class="details">
            <ul>
            <?php while ( have_posts() ) : the_post(); ?>
                <li>
                    <?php if (has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <?php the_title('<h2 class="course-title-js">', '</h2>'); ?>
                    <?php the_excerpt(); ?>

                <?php $lecturers = new WP_Query(array(
                    'post_type' => 'lecturers',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'educational-direction',
                            'field' => 'slug',
                            'terms' => $direction->slug
                        )
                    ),
                    'posts_per_page' => -1,
                    'orderby' => 'ID',
                    'order' => 'ASC'
                ));
                if ( $lecturers->have_posts()) : ?>
                    <h3>Команда</h3>
                    <ul class="team">
                    <?php while ( $lecturers->have_posts() ) : $lecturers->the_post(); ?>
                        <li>
                            <?php if (has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                            <?php the_title('<h3>', '</h3>'); ?>
                            <?php the_content(); ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                <?php else : endif; wp_reset_query(); ?>

                <?php $questions = get_post_meta($post->ID, 'exam-questions', false);
                    if ($questions) : ?>
                    <h3>ТЕМИ ПИТАНЬ НА ЕКЗАМЕНI</h3>
                    <ul class="questions">
                    <?php foreach($questions as $questions) { ?>
                        <li><?php echo $questions; ?></li>
                    <?php } ?>
                    </ul>
                <?php endif; ?>
                <?php $content = get_the_content();
                    if ($content) : ?>
                    <h3>Слово від викладачів</h3>
                    <?php remove_filter ('the_content', 'wpautop'); the_content(); ?>
                <?php endif; ?>
                    <a class="register" href="#">Зареєструватися</a>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    <?php else: endif; ?>

    </div><!-- content -->

<?php get_footer(); ?>