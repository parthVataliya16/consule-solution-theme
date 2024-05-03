<?php
/*
Template Name: Services
@package wordpress
*/

echo get_the_content();

echo "Get the post title alphabetically: ";

echo do_shortcode('[alphabatically-post]');

$service_meta_query_args = [
    [
        'key' => 'feature',
        'value' => 1,
        'type' => 'numeric'
    ]
];

$service_tax_query_args = [
    [
        'taxonomy' => 'service_cat',
        'field' => 'slug',
        'terms' => 'health'
    ]
];

/*
* Get the service which are feature service and taxonomy is health
*/

$get_service_args = [
    'post_type' => 'service',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => $service_tax_query_args,
    'meta_query' => $service_meta_query_args
];

$get_service_query = new WP_Query($get_service_args);

echo "Get the service post type which are the featured service and taxonomy is health:";

if ($get_service_query->have_posts()) {
    while ($get_service_query->have_posts()) {
        $get_service_query->the_post();
        echo "<h3>". get_the_title() ."</h3>";
    }
}

wp_reset_postdata();

?>