<?php

/**
 * Enqueue custom scripts and styles function
*/

function load_custom_scripts_and_styles() {
    wp_register_style('bootstrapcss', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrapcss');

    wp_register_style('headercss', get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style('headercss');

    wp_register_style('mediacss', get_template_directory_uri() . '/assets/css/media.css');
    wp_enqueue_style('mediacss');

    wp_register_style('stylecss', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style("stylecss");

    wp_register_style('swipecss', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('swipecss');

    wp_register_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js');
    wp_enqueue_script('bootstrapjs');

    wp_register_script('fileuploadjs', get_template_directory_uri() . '/assets/js/fileupload.js');
    wp_enqueue_script('fileuploadjs');

    wp_register_script('jqueryjs', get_template_directory_uri() . '/assets/js/jquery-3.6.3.min.js');
    wp_enqueue_script('jqueryjs');

    wp_register_script('jquery-minjs', get_template_directory_uri() . '/assets/js/jquery.min.js');
    wp_enqueue_script('jquery-minjs');

    wp_register_script('settingjs', get_template_directory_uri() . '/assets/js/setting.js');
    wp_enqueue_script('settingjs');

    wp_register_script('swipejs', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js');
    wp_enqueue_script('swipejs');

    wp_register_script('pagejs', get_template_directory_uri() . '/assets/js/page.js');
    wp_enqueue_script('pagejs');
    wp_localize_script('pagejs', 'ajax_object', ['url' => admin_url('admin-ajax.php')]);
}

add_action('wp_enqueue_scripts', 'load_custom_scripts_and_styles');

/**
 * Load more blogs function
 * Function called by ajax
*/

function view_all_blogs() {
    $get_blog_args = [
        'post_type'=> "post",
        'post_status' => "publish",
        'offset' => 3
    ];
    $get_all_blogs_query = new WP_Query($get_blog_args);

    if ( $get_all_blogs_query->have_posts() ) {
        while ( $get_all_blogs_query->have_posts() ) {
            $get_all_blogs_query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url();
            $post_time = get_the_date();
            $title = get_the_title();
 
            echo  "<div class='col-lg-6'>";
            get_template_part('template-part/card');
            echo "</div>";
        }

    }
    wp_reset_postdata();
    exit;
}

add_action('wp_ajax_view_all_blogs', 'view_all_blogs');
add_action('wp_ajax_nopriv_view_all_blogs', 'view_all_blogs');

/**
 * Register post type service
*/

function create_service_post_type() {
	$labels = array( 
		'name' => 'Services',
		'singular_name' => 'Service',
		'add_new' => 'New Service',
		'add_new_item' => 'Add New Service',
		'edit_item' => 'Edit Service',
		'new_item' => 'New Service',
		'view_item' => 'View Service',
		'search_items' => 'Search Service',
		'not_found' => 'No Service Found',
		'not_found_in_trash' => 'No Service found in Trash'
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'service' ),
		'taxonomies' => array( 'service_cat'), 
	);
	register_post_type( 'service', $args );
} 
add_action( 'init', 'create_service_post_type' );

/**
 * Register taxanomy for service post type
*/

function create_service_category() {
	register_taxonomy('service_cat', 'service', [
		'label' => 'service_cat',
		'public' => true,
		'hierarchical' => true,
		'rewrite' => false
	]);
}

add_action('init', 'create_service_category');

/**
 * Register REST API rout /post_info
*/

function post_info_rest_api() {
    register_rest_route('wp/v2', '/post_info', array (
        'methods' => 'GET',
        'callback' => 'get_latest_post_info'
    ));
}

add_action('rest_api_init', 'post_info_rest_api');

/**
 * Return the latest post
*/

function get_latest_post_info() {
    $get_post_args = [
        'post_type' => "post",
        'post_status' => "publish",
        'orderby' => "post_date",
        'posts_per_page' => 3
    ];

    $latest_post_query = new WP_Query($get_post_args);
    return $latest_post_query;
}

/**
 * custom widget area function
*/

function custom_widget_area() {
    register_sidebar(array(
		'name'          => esc_html('custome_widget'),
		'id'            => 'custom_widget',
		'description'   => 'Custom Widget',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>'
	));
}

add_action('widgets_init', 'custom_widget_area');

/**
 * short code for get the 5 post title aplphabeticaaly
*/

function get_post_alphabatically() {
    $get_post_args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => 5
    ];

    $get_post_query = new WP_Query( $get_post_args );
    $response = "";

    if ( $get_post_query->have_posts() ) {
        while ( $get_post_query->have_posts() ) {
            $get_post_query->the_post();
            $response .= "<h3>". get_the_title() ."</h3>";
        }
    }
    return $response;
}

add_shortcode('alphabatically-post', 'get_post_alphabatically');

?>