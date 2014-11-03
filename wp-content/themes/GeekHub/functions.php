<?php
/**
* load styles and scripts
**/
function load_style_script(){
    wp_enqueue_style('style', get_stylesheet_uri() );
    wp_enqueue_style('flipclock', get_template_directory_uri() . '/css/flipclock.css' );

    wp_enqueue_script('jquery-1.6.4.min', get_template_directory_uri() . '/js/jquery-1.6.4.min.js' );
    wp_enqueue_script('prefixfree.min', get_template_directory_uri() . '/js/libs/prefixfree.min.js' );
//    wp_enqueue_script('flipclock.min', get_template_directory_uri() . '/js/flipclock.min.js' );
    wp_enqueue_script('mainJS', get_template_directory_uri() . '/js/mainJS.js' );
    wp_enqueue_script('openapi', '//vk.com/js/api/openapi.js?115' );
    wp_enqueue_script('maps.googleapis', '//maps.googleapis.com/maps/api/js?sensor=true' );
}
add_action('wp_enqueue_scripts', 'load_style_script');


/**
* logo at the entrance to the admin panel
**/
function my_custom_login_logo(){
    echo '<style type="text/css">
    h1 a { width: 167px !important; height: 71px !important; background-size: 167px !important; background-image:url('.get_bloginfo('template_directory').'/images/geekhub_logo.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');


/**
* put a link to the logo on the site, and not on wordpress.org
**/
add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );

/**
* remove the title in the logo "site is powered by wordpress"
**/
add_filter( 'login_headertitle', create_function('', 'return false;') );


/**
* redirect to login on /wp-login.php and to admin on /wp-admin.php
**/
add_action('template_redirect', 'kama_login_redirect');
function kama_login_redirect(){
    if( strpos($_SERVER['REQUEST_URI'], 'login')!==false )
        $loc = '/wp-login.php';
    elseif( strpos($_SERVER['REQUEST_URI'], 'admin')!==false )
        $loc = '/wp-admin/';
    if( $loc ){
        header( 'Location: '.get_option('site_url').$loc, true, 303 );
        exit;
    }
}

/**
* smart display errors
**/
add_action('init', 'enable_errors');
function enable_errors(){
    if( $GLOBALS['user_level'] < 5 )
        return;
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set("display_errors", 1);
}


/**
* disable the visual editor
**/
add_filter('user_can_richedit' , create_function ('' , 'return false;') , 50 );


/**
* support thumbnails
**/
add_theme_support( 'post-thumbnails' );


/**
* support menu
**/
if ( function_exists( 'register_nav_menus' ) )
{
    register_nav_menus(
        array(
            'main-nav' => __('Main Navigation'),
            'footer-nav' => __('Footer Nav'),
        )
    );
}
function main_nav(){
    wp_list_pages('title_li=&');
}
function footer_nav(){
    wp_list_pages('title_li=&');
}


/**
* support widgets
**/
if ( function_exists('register_sidebar') )
    register_sidebar( array(
        'name' => 'Widget',
        'id' => 'widget',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));


/**
* dynamic logo in Customization API
**/
function upload_logo_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'logo_setting' , array(
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_section( 'logo_section' , array(
        'title'      => __( 'Logo', 'geekhub' ),
        'priority'   => 20,
        'description' => __( 'Upload new logo for yours website', 'geekhub' ),
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_setting', array(
        'label'        => __( 'Upload logo', 'geekhub' ),
        'section'    => 'logo_section',
        'settings'   => 'logo_setting',
    ) ) );
}
add_action( 'customize_register', 'upload_logo_customize_register' );


/**
* social links in Customization API
**/
function social_links_customize_register($wp_customize) {
    class Social_Links_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="1" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
        }
    }
    $wp_customize->add_section( 'social_links_section', array(
        'title'          => __( 'Social Links', 'geekhub' ),
        'priority'       => 21,
    ) );

    $wp_customize->add_setting( 'fb_setting', array(
        'default'        => '#',
    ) );
    $wp_customize->add_control( new Social_Links_Textarea_Control ( $wp_customize, 'fb_setting', array(
        'label'   => __( 'Authentication through Facebook', 'geekhub' ),
        'section' => 'social_links_section',
        'settings'   => 'fb_setting',
    ) ) );

    $wp_customize->add_setting( 'vk_setting', array(
        'default'        => '#',
    ) );
    $wp_customize->add_control( new Social_Links_Textarea_Control ( $wp_customize, 'vk_setting', array(
        'label'   => __( 'Authentication through VKontakte', 'geekhub' ),
        'section' => 'social_links_section',
        'settings' => 'vk_setting',
    ) ) );

    $wp_customize->add_setting( 'tw_setting', array(
        'default'        => '#',
    ) );
    $wp_customize->add_control( new Social_Links_Textarea_Control ( $wp_customize, 'tw_setting', array(
        'label'   => __( 'Authentication through Twitter', 'geekhub' ),
        'section' => 'social_links_section',
        'settings'   => 'tw_setting',
    ) ) );

    $wp_customize->add_setting( 'yt_setting', array(
        'default' => '#',
    ) );
    $wp_customize->add_control( new Social_Links_Textarea_Control ( $wp_customize, 'yt_setting', array(
        'label'   => __( 'Authentication through YouTube', 'geekhub' ),
        'section' => 'social_links_section',
        'settings' => 'yt_setting',
    ) ) );
}
add_action( 'customize_register', 'social_links_customize_register' );


/**
* custom post type - Our courses
**/
function courses() {
    register_post_type( 'courses', array(
        'description' => __( 'Rendered free courses of GeekHub', 'geekhub' ),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'labels' => array(
            'name' => __( 'Our Courses', 'geekhub' ),
            'singular_name' => __( 'Course', 'geekhub' ),
            'menu_name' => __( 'Courses', 'geekhub' ),
            'name_admin_bar' => __( 'Course', 'geekhub' ),
            'add_new' => __( 'Add New', 'geekhub' ),
            'add_new_item' => __( 'Add New Course', 'geekhub' ),
            'edit_item' => __( 'Edit Course', 'geekhub' ),
            'new_item' => __( 'New Course', 'geekhub' ),
            'all_items' => __( 'All Courses', 'geekhub' ),
            'view_item' => __( 'View Courses', 'geekhub' ),
            'search_items' => __( 'Search Course', 'geekhub' ),
            'not_found' => __( 'No courses found' ),
            'not_found_in_trash' => __( 'No courses found in the Trash', 'geekhub' ),
            'parent_item_colon' => '',
        )
    ));
}
add_action( 'init', 'courses' );


/**
* custom post type - GeekHub team
**/
function lecturers() {
    register_post_type( 'lecturers', array(
        'description' => __( 'Lecturers of GeekHub', 'geekhub' ),
        'public' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-groups',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'labels' => array(
            'name' => __( 'Our Lecturers', 'geekhub' ),
            'singular_name' => __( 'Lecturer', 'geekhub' ),
            'menu_name' => __( 'Lecturers', 'geekhub' ),
            'name_admin_bar' => __( 'Lecturer', 'geekhub' ),
            'add_new' => __( 'Add New', 'geekhub' ),
            'add_new_item' => __( 'Add New Lecturer', 'geekhub' ),
            'edit_item' => __( 'Edit Lecturer', 'geekhub' ),
            'new_item' => __( 'New Lecturer', 'geekhub' ),
            'all_items' => __( 'All Lecturers', 'geekhub' ),
            'view_item' => __( 'View Lecturers', 'geekhub' ),
            'search_items' => __( 'Search Lecturer', 'geekhub' ),
            'not_found' => __( 'No courses found', 'geekhub' ),
            'not_found_in_trash' => __( 'No courses found in the Trash', 'geekhub' ),
            'parent_item_colon' => '',
        )
    ));
}
add_action( 'init', 'lecturers' );

/**
* registration new taxonomies for post type "GeekHub team"
**/
function create_direction_taxonomies(){
    // Добавляем НЕ древовидную таксономию 'educational-direction'
    register_taxonomy( 'educational-direction', array('courses', 'lecturers'), array(
        'hierarchical' => false,
        'labels' => array(
            'name' => __( "Educational Direction", 'geekhub' ),
            'singular_name' => __( 'Directions', 'geekhub' ),
            'search_items' =>  __( 'Search Directions', 'geekhub' ),
            'all_items' => __( 'All Directions', 'geekhub' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Direction', 'geekhub' ),
            'update_item' => __( 'Update Direction', 'geekhub' ),
            'add_new_item' => __( 'Add New Direction', 'geekhub' ),
            'new_item_name' => __( 'New Direction Name', 'geekhub' ),
            'separate_items_with_commas' => __( 'Separate direction with commas' ),
            'add_or_remove_items' => __( 'Add or remove direction' ),
            'choose_from_most_used' => __( 'Choose from the most used directions' ),
            'menu_name' => __( 'Directions', 'geekhub' ),
        ),
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'educational-direction' ),
    ));
}
add_action( 'init', 'create_direction_taxonomies', 0 );


/**
 * custom post type - Our sponsors
 **/
function sponsors() {
    register_post_type( 'sponsors', array(
        'description' => __( 'Our Sponsors', 'geekhub' ),
        'public' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-star-empty',
        'supports' => array( 'title', 'thumbnail' ),
        'labels' => array(
            'name' => __( 'Sponsors', 'geekhub' ),
            'singular_name' => __( 'Sponsor', 'geekhub' ),
            'menu_name' => __( 'Sponsors', 'geekhub' ),
            'name_admin_bar' => __( 'Sponsor', 'geekhub' ),
            'add_new' => __( 'Add New', 'geekhub' ),
            'add_new_item' => __( 'Add New Sponsor', 'geekhub' ),
            'edit_item' => __( 'Edit Sponsor', 'geekhub' ),
            'new_item' => __( 'New Sponsor', 'geekhub' ),
            'all_items' => __( 'All Sponsors', 'geekhub' ),
            'view_item' => __( 'View Sponsors', 'geekhub' ),
            'search_items' => __( 'Search Sponsor', 'geekhub' ),
            'not_found' => __( 'No courses found', 'geekhub' ),
            'not_found_in_trash' => __( 'No courses found in the Trash', 'geekhub' ),
            'parent_item_colon' => '',
        )
    ));
}
add_action( 'init', 'sponsors' );