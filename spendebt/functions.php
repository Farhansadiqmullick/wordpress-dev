<?php
show_admin_bar( false );

require_once('wp_bootstrap_navwalker.php');
require_once('widget/social-icons-widget.php');
if(class_exists('Attachments')){
    require_once('lib/attachments.php');
}
require_once('widget/category-posts.php');

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
    wp_enqueue_style( 'tiny-slider-style', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css', array(), false, 'all');
    wp_enqueue_style( 'style-css', get_stylesheet_uri(), null, date("ymd-Gis", filemtime( get_stylesheet_directory())));
    //Enqueue Scripts
    wp_enqueue_script('jquery');
	wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);
   // wp_enqueue_script('tiny-slider-js', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, time(), true); 
  //  wp_enqueue_script('tns-scripts', get_template_directory_uri() . '/js/tns-scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/tns-scripts.js' )), true);
    
    $ajaxurl = admin_url( 'admin-ajax.php');
    wp_enqueue_script('spendebt-contact-js', get_template_directory_uri() . '/js/contact.js', array('jquery'), date("ymd-Gis",filemtime( get_template_directory() . '/js/contact.js' )), true);
    wp_localize_script( 'spendebt-contact-js', 'spendebturl', array('ajaxurl' => $ajaxurl) );
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

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> 'false'
	));

	
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
            'before_widget' => '<div class="text-center">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
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
            'before_widget' => '<div class = "text-center">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
            ) );
        register_sidebar( array(
            'name' => 'Contact Widget',
            'id' => 'contact-widget',
            'class' => 'contact-widget',
            'description' => 'Appears in the contact widget',
            'before_widget' => '<ul class="social-media social-color large list-inline">',
            'after_widget' => '</ul>',
            'before_title' => '<h4 class="social-title">',
            'after_title' => '</h4>',
            ) );
        register_sidebar( array(
            'name' => 'Cateogry Posts',
            'id' => 'category-posts',
            'class' => 'category-posts',
            'description' => 'Appears in the Widgetized Area',
            'before_widget' => '<div class="text">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title separator">',
            'after_title' => '</h4>',
            ) );
        }
add_action('widgets_init','spendebt_footer_widgets');

function search_form_spendebt($form){
    
    $homedir = home_url("/our-blog");
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
add_filter("get_search_form", "search_form_spendebt");

function spendebt_postsbycategory() {
    // the query
    $the_query = new WP_Query( array( 'category_name' => 'Blog', 'posts_per_page' => 3 ) ); 
     
    // The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<ul class="postsbycategory widget_recent_entries">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
                if ( has_post_thumbnail() ) {
                $string .= '<li>';
                $string .= '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_post_thumbnail($post_id, array( 50, 50) ) . get_the_title() .'</a></li>';
                } else { 
                // if no featured image is found
                $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></li>';
                }
                }
        } else {
        // no posts found
    }
    $string .= '</ul>';
     
    return $string;
     
    /* Restore original Post Data */
    wp_reset_postdata();
    }
    // Add a shortcode
    add_shortcode('categoryposts', 'spendebt_postsbycategory');
     
    // Enable shortcodes in text widgets
    add_filter('widget_text', 'do_shortcode');

function spendebt_contact_email(){
    $fname = isset($_POST['fname']) ? $_POST['fname']:'';
    $lname = isset($_POST['lname']) ? $_POST['lname']:'';
    $email = isset($_POST['email']) ? $_POST['email']:'';
    $subject = isset($_POST['subject']) ? $_POST['subject']:'';
    $message = isset($_POST['message']) ? $_POST['message']:'';

    $_message = sprintf("%s\nFname: %s\nLname: %s\nEmail: %s\nSubject: %s",$message,$fname,$lname,$email,$subject);
    $admin_email = get_option('admin_email');
    
    wp_mail($admin_email, __('You have a message from Spendent Website', 'spendebt'),$_message,"From: {$admin_email}\r\n");
    die('Mail Sent Successfully');
}
add_action('wp_ajax_contact', 'spendebt_contact_email');
add_action('wp_ajax_nopriv_contact', 'spendebt_contact_email');

add_action("gform_after_submission_2", "acf_post_submission", 10, 2);

class acf_field_gravity_forms extends acf_field {
    /*
    *  __construct
    *  This function will setup the field type data
    */
    function __construct() {
        // vars
        $this->name = 'gravity_forms_field';
        $this->label = __('Gravity Forms');
        $this->category = __("Relational", 'aventus'); // Basic, Content, Choice, etc
        $this->defaults = array(
        'allow_multiple' => 0,
        'allow_null' => 0
        );
        // do not delete!
        parent::__construct();
    }
  
    /*
    *  render_field_settings()
    *  Create extra settings for your field. These are visible when editing a field
    */
    function render_field_settings( $field ) {
        
        /*
        *  acf_render_field_setting
        */
        acf_render_field_setting( $field, 
            array(
                'label' => 'Allow Null?',
                'type'  =>  'radio',
                'name'  =>  'allow_null',
                'choices' =>  array(
                1 =>  __("Yes", 'aventus'),
                0 =>  __("No", 'aventus'),
                ),
                'layout'  =>  'horizontal'
            )
        );

        acf_render_field_setting( $field, 
            array(
                'label' => 'Allow Multiple?',
                'type'  =>  'radio',
                'name'  =>  'allow_multiple',
                'choices' =>  array(
                    1 =>  __("Yes", 'aventus'),
                    0 =>  __("No", 'aventus'),
                ),
                'layout'  =>  'horizontal'
            )
        );
    }
  
    /*
    *  render_field()
    *  Create the HTML interface for your field
    *  @param $field (array) the $field being rendered
    */
      
    function render_field( $field ) {

        /*
        *  Review the data of $field.
        *  This will show what data is available
        */
        $field = array_merge($this->defaults, $field);
        $choices = array();

        //Show notice if Gravity Forms is not activated
        if (class_exists('RGFormsModel')) 
        {
            $forms = RGFormsModel::get_forms(1);
        }   
        else 
        {
            echo "<font style='color:red;font-weight:bold;'>Warning: Gravity Forms is not installed or activated. This field does not function without Gravity Forms!</font>";
        }
        
        //Prevent undefined variable notice
        if(isset($forms)){
          foreach( $forms as $form ){
            $choices[ intval($form->id) ] = ucfirst($form->title);
          }
        }
        // override field settings and render
        $field['choices'] = $choices;
        $field['type']    = 'select';
            if ( $field['allow_multiple'] ) {
                $multiple = 'multiple="multiple" data-multiple="1"';
                echo "<input type=\"hidden\" name=\"{$field['name']}\">";
            }
            else $multiple = '';
        ?>
        <select id="<?php echo str_replace(array('[',']'), array('-',''), $field['name']);?>" name="<?php echo $field['name']; if( $field['allow_multiple'] ) echo "[]"; ?>"<?php echo $multiple; ?>>
            <?php
            if ( $field['allow_null'] ) 
                echo '<option value="">- Select -</option>';
                
            foreach ($field['choices'] as $key => $value){
                $selected = '';
                if ( (is_array($field['value']) && in_array($key, $field['value'])) || $field['value'] == $key )
                    $selected = ' selected="selected"';
            ?>
                <option value="<?php echo $key; ?>"<?php echo $selected;?>><?php echo $value; ?></option>
            <?php } ?>
        </select>
        <?php
    }

    /*
    *  format_value()
    *  This filter is applied to the $value after it is loaded from the db and before it is returned to the template
    */
    function format_value( $value, $post_id, $field ) {
            
        //Return false if value is false, null or empty
        if( !$value || empty($value) ){
            return false;
        }
            
        //If there are multiple forms, construct and return an array of form objects
        if( is_array($value) && !empty($value) ) 
        {
            $form_objects = array();
            foreach($value as $k => $v)
            {
                $form = GFAPI::get_form( $v );
                //Add it if it's not an error object
                if( !is_wp_error($form) )
                {
                    $form_objects[$k] = $form;
                }
            }

            //Return false if the array is empty
            if( !empty($form_objects) )
            {
                return $form_objects;   
            }
            else
            {
                return false;
            }
        }
        else
        {
            $form = GFAPI::get_form(intval($value));
            //Return the form object if it's not an error object. Otherwise return false. 
            if( !is_wp_error($form) )
            {
                return $form;   
            }
            else
            {
                return false;
            }
        }
    }
}

// create field
new acf_field_gravity_forms();



function the_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
} // end the_breadcrumb()


?>