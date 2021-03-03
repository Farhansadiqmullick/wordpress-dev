<?php


require_once('wp_bootstrap_navwalker.php');
require_once('widget/social-icons-widget.php');
if(class_exists('Attachments')){
    require_once('lib/attachments.php');
}

function spendebt_setup(){
    
    load_theme_textdomain( 'spendebt', get_template_directory( ).'/languages');
    
    
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post_thumb', 737, 452, true);
    add_image_size( 'blog_post', 382, 199, true);
    add_image_size('logo', 180, 90, true);
    add_image_size( 'icon', 58, 58, true);
    add_image_size('banner_image', 578, 982, true);
    add_image_size( 'how_works_image', 800, 450, true);

    
    register_nav_menus( array(
        'menu' => esc_html__('Primary Menu', 'spendebt'),
        'footer' => esc_html__('Footer Menu', 'spendebt'),
        'footer-social' => esc_html__('Footer Social', 'spendebt'),
        'footer-bottom' => esc_html__('Footer Bottom', 'spendebt'),
    ) );

}

add_action('after_setup_theme','spendebt_setup');


function spendebt_scripts(){

    wp_enqueue_style('typekit-cs', '//use.typekit.net/sos3edy.css', array(), false, 'all');
    wp_enqueue_style('plugins-cs', get_template_directory_uri() . '/css/plugins.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/plugins.css' )), 'all');
	wp_enqueue_style( 'spendebt-style', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_stylesheet_directory())));
    
    //Enqueue Scripts
    wp_enqueue_script('jquery');
	wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);

}

add_action('wp_enqueue_scripts', 'spendebt_scripts');



function spendebt_custom_mime_types( $mimes ) {
	
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	$mimes['doc'] = 'application/msword';
	 

	 
	return $mimes;
}
add_filter( 'upload_mimes', 'spendebt_custom_mime_types' );



if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function aventus_reorder_admin_menu( $__return_true ) {
	return array(
		'index.php',                 	// Dashboard
		'separator1',                	// --Space--
		'acf-options',               	// ACF Theme Settings
        'upload.php',                	// Media
        'edit.php',   					// Posts 
		'edit.php?post_type=page',   	// Pages 
		'themes.php',                	// Appearance
		'plugins.php',               	// Plugins
		'users.php',                 	// Users
		'tools.php',                 	// Tools
		'options-general.php',       	// Settings
	);
}
add_filter( 'menu_order', 'spendent_reorder_admin_menu' );


function spendebt_footer_widgets(){
    register_sidebar( array(
        'name' => 'Footer Sidebar-1',
        'id' => 'footer-sidebar-1',
        'class' => 'footer-sidebar',
        'description' => 'Appears in the footer',
        'before_widget' => '<div id="%1$s" class="subscribe-newsletter text-center">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>',
        ) );

        register_sidebar( array(
            'name' => 'Footer Social',
            'id' => 'footer-social',
            'class' => 'footer-social',
            'description' => 'Appears in the footer',
            'before_widget' => '<ul class="social-media list-inline',
            'after_widget' => '</ul>',
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
            ) );

        register_sidebar( array(
            'name' => 'Footer Bar-1',
            'id' => 'footer-bar-1',
            'class' => 'footer-bar-1',
            'description' => 'Appears in the footer bar',
            'before_widget' => '<p>',
            'after_widget' => '</p>',
            'before_title' => '',
            'after_title' => '',
            ) );
        register_sidebar( array(
            'name' => 'Footer Bottom',
            'id' => 'footer-bottom',
            'class' => 'footer-bottom',
            'description' => 'Appears in the footer bar',
            'before_widget' => '<ul class="footer-links list-inline">',
            'after_widget' => '</ul>',
            'before_title' => '',
            'after_title' => '',
            ) );
}
add_action('widgets_init','spendebt_footer_widgets');

function search_form_spendebt($form){
    
    $homedir = home_url("/our-blog/?s=");
    $btn_label = __("Search", "spendebt");


    $newform = <<<FORM
    <form action="{$homedir}" class="search-form">
        <div class="form-group">
            <input type="search" placeholder="Search the Blog" value="{$btn_label}">
            <button type="submit"><i class="icon-search"></i></button>
        </div>
    </form>
    
    FORM;
    return $newform;
}
add_filter("get_search_form", "search_form_spendebt")




?>