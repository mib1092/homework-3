<? get_header();
/*
Template Name: Contacts
*/
?>

    <div id="content">

        <? if ( have_posts() ) : ?>
            <div class="contacts">
                <? while ( have_posts() ) : the_post(); ?>

                    <? the_title('<h2>', '</h2>'); ?>
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
                            <? $href = get_theme_mod( 'fb_setting' ); if ($href) {?>
                                <li class="fb"><a href="<? echo $href ?>">facebook</a></li>
                            <? }
                            $href = get_theme_mod( 'vk_setting' ); if ($href) {?>
                                <li class="vk"><a href="<? echo $href ?>">vkontakte</a></li>
                            <? }
                            $href = get_theme_mod( 'tw_setting' ); if ($href) {?>
                                <li class="tw"><a href="<? echo $href ?>">twitter</a></li>
                            <? } ?>
                            </ul>
                        </dd>
                        <dt>
                        <h3>Пишіть</h3>
                        </dt>
                        <dd class="email">
                            <? bloginfo('admin_email'); ?>
                        </dd>
                        <dd><? remove_filter ('the_content', 'wpautop'); the_content(); ?></dd>
                    </dl>

                <? endwhile; ?>
            </div>
        <? else: echo "<p>Страница не найдена...</p>" ?>
        <? endif; ?>

    </div><!-- content -->

<? get_footer(); ?>