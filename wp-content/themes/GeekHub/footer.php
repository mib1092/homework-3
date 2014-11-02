<ul id="footer">
    <li>
        <?php wp_nav_menu(array(
            'theme_location' => 'footer-nav',
            'menu' => 'Footer Nav',
            'menu_class' => 'nav',
            'container' => false
        )); ?>
    </li>
    <li>
        &copy; Copyright <? $copyYear = 2011; $curYear = date('Y');
                            echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : ''); ?>
    </li>
</ul>
</div>
<? wp_footer(); ?>
</body>

</html>