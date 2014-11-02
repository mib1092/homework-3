<? $course = get_the_title(); ?>
<? get_header(); ?>

    <div id="content">

    <? if ( have_posts() ) : ?>
        <? get_sidebar('courses'); ?>
        <div class="details">
            <ul>
            <? while ( have_posts() ) : the_post(); ?>
                <li>
                    <? if (has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <? the_title('<h2>', '</h2>'); ?>
                    <? the_excerpt(); ?>

                <? $lecturers = new WP_Query(array(
                    'post_type' => 'lecturers',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'lecturers-courses',
                            'field' => 'slug',
                            'terms' => $course
                        )
                    ),
                    'posts_per_page' => -1,
                    'orderby' => 'ID',
                    'order' => 'ASC'
                ));
                if ( $lecturers->have_posts()) : ?>
                    <h3>Команда</h3>
                    <ul class="team">
                    <? while ( $lecturers->have_posts() ) : $lecturers->the_post(); ?>
                        <li>
                            <? if (has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                            <? the_title('<h3>', '</h3>'); ?>
                            <? the_content(); ?>
                        </li>
                    <? endwhile; ?>
                    </ul>
                <? else : endif; wp_reset_query(); ?>

                <? $questions = get_post_meta($post->ID, 'exam-questions', false);
                    if ($questions) : ?>
                    <h3>ТЕМИ ПИТАНЬ НА ЕКЗАМЕНI</h3>
                    <ul class="questions">
                    <?php foreach($questions as $questions) { ?>
                        <li><? echo $questions; ?></li>
                    <? } ?>
                    </ul>
                <? endif; ?>
                <? $content = get_the_content();
                    if ($content) : ?>
                    <h3>Слово від викладачів</h3>
                    <? remove_filter ('the_content', 'wpautop'); the_content(); ?>
                <? endif; ?>
                    <a class="register" href="#">Зареєструватися</a>
                </li>
            <? endwhile; ?>
            </ul>
        </div>
    <? else: endif; ?>

    </div><!-- content -->

<? get_footer(); ?>