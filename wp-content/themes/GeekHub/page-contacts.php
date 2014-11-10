<?php get_header();
/*
Template Name: Contacts
*/
?>

    <div id="content">

        <?php if ( have_posts() ) : ?>
            <div class="contacts">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php the_title('<h2>', '</h2>'); ?>
                    <dl>
                        <dt class="map">
                        <h3>Заходьте</h3>
                        </dt>
                        <dd class="map"><div id="map" style="width:382px; height:287px"></div></dd>
                        <dt class="follow">
                        <h3>Слідкуйте</h3>
                        </dt>
                        <dd>
                            <ul>
                            <?php $href = get_theme_mod( 'fb_setting' ); if ($href) {?>
                                <li class="fb"><a href="<?php echo $href ?>">facebook</a></li>
                            <?php }
                            $href = get_theme_mod( 'vk_setting' ); if ($href) {?>
                                <li class="vk"><a href="<?php echo $href ?>">vkontakte</a></li>
                            <?php }
                            $href = get_theme_mod( 'tw_setting' ); if ($href) {?>
                                <li class="tw"><a href="<?php echo $href ?>">twitter</a></li>
                            <?php } ?>
                            </ul>
                        </dd>
                        <dt>
                        <h3>Пишіть</h3>
                        </dt>
                        <dd class="email">
                            <?php bloginfo('admin_email'); ?>
                        </dd>
                        <dd><?php remove_filter ('the_content', 'wpautop'); the_content(); ?></dd>
                    </dl>

                <?php endwhile; ?>
            </div>
        <?php else: echo "<p>Страница не найдена...</p>" ?>
        <?php endif; ?>

    </div><!-- content -->

<?php get_footer(); ?>