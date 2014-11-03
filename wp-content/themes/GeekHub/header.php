<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title><? is_home() ? bloginfo('description') : wp_title(''); ?></title>
    <meta name="description" content="GeekHub надає можливість отримати практичні знання та навички в сфері розробки програмного забезпечення">
    <meta name="keywords" content="GeekHub, ГікХаб, Черкаси, Cherkassy">

    <? wp_head(); ?>
    <script type="text/javascript">
        function initialize() {
            var latlng = new google.maps.LatLng(49.42608363349172,32.09461569786072);
            var myOptions = {
                zoom: 15,
                center: latlng,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"), myOptions);
            var marker = new google.maps.Marker({
                position: latlng,
                title:"Дім Євангелія, вул. Горького 60"
            });

            var infowindow = new google.maps.InfoWindow({
                content: marker.title
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

            marker.setMap(map);
        }

    </script>

<!--    <script type="text/javascript">-->
<!--        $(function(){-->
<!---->
<!--            var t1 = new Date("September 17, 2014 00:00:00");-->
<!--            var t2 = new Date();-->
<!--            var seconds = (t1.getTime() - t2.getTime()) / 1000;-->
<!---->
<!--            var Seconds_Between_Dates = Math.abs(seconds);-->
<!---->
<!--            var clock = $('.countdown').FlipClock(Seconds_Between_Dates,{clockFace:'DailyCounter',countdown:true,	showSeconds: false});-->
<!---->
<!---->
<!--            function isEmailValid(email){-->
<!--                var pass = /^[a-z0-9._%+-]+@[a-z0-9._-]+\.[a-z]{2,6}$/i;-->
<!--                if(!pass.test(email)){-->
<!--                    return false;-->
<!--                }-->
<!--                return true;-->
<!--            }-->
<!---->
<!--            $('.types li').click(function(){-->
<!--                var index = $(this).index();-->
<!--                window.location = 'detailsd41d.html?'+index;-->
<!--                return false;-->
<!--            })-->
<!---->
<!--            $('#header form').submit(function(){-->
<!--                var email = $(this).find('.email');-->
<!--                var loader = $(this).find('span');-->
<!--                var val = email.val();-->
<!---->
<!--                if (!isEmailValid(val)) {-->
<!--                    email.addClass('error');-->
<!--                    email.focus();-->
<!--                    return false;-->
<!--                }-->
<!--                email.removeClass('error');-->
<!--                email.attr('disabled',true);-->
<!--                loader.fadeIn(300);-->
<!---->
<!--                var data = { email: val };-->
<!---->
<!--                $.post('notify.html', data, function(){-->
<!--                    loader.fadeOut(300);-->
<!--                    email.attr('disabled',false);-->
<!--                    email.val('');-->
<!--                    alert('Готово');-->
<!--                });-->
<!---->
<!--                return false;-->
<!--            });-->
<!--        });-->
<!--    </script>-->

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-27082120-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter17027506 = new Ya.Metrika({id:17027506, enableAll: true, webvisor:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="http://mc.yandex.ru/watch/17027506/1" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<body <? body_class(); ?> <? if(is_page('contacts')) : echo "onload='initialize()'"; endif; ?>>
<div id="wrap">
    <div id="header">
        <h1 style="background:url('<? echo get_theme_mod( 'logo_setting' ); ?>') no-repeat;">
            <a href="<? echo home_url(); ?>">GeekHub</a>
        </h1>

        <?php wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'menu' => 'Main Navigation',
            'menu_class' => 'nav',
            'container' => false
        )); ?>

        <ul class="links">
        <? $href = get_theme_mod( 'fb_setting' ); if ($href) {?>
            <li class="fb"><a href="<? echo $href ?>">facebook</a></li>
        <? }
        $href = get_theme_mod( 'vk_setting' ); if ($href) {?>
            <li class="vk"><a href="<? echo $href ?>">Вконтакте</a></li>
        <? }
        $href = get_theme_mod( 'tw_setting' ); if ($href) {?>
            <li class="tw"><a href="<? echo $href ?>">twitter</a></li>
        <? }
        $href = get_theme_mod( 'yt_setting' ); if ($href) {?>
            <li class="yb"><a href="<? echo $href ?>">youtube</a></li>
        <? } ?>
        </ul>

    <? if (is_home()) { ?>
        <span class="line"></span>

        <h4 class="registration">Реєстрацію на 4й сезон закрито</h4>
        <p class="note">*залиште нам ваш емейл і ми повідомимо вас про початок реєстрації</p>
        <form action="#">
            <fieldset>
                <span></span>
                <input type="text" class="email" placeholder="Ваш email" />
                <input type="submit" value="Відіслати" />
            </fieldset>
        </form>
        <img src="<? bloginfo('template_url'); ?>/images/splash.png" alt="splash" />
    <? } ?>
    </div><!-- header -->