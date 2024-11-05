<?php
/**Enqueue styles and scripts */
function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style('hello-elementor-parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');

/**For checking debug*/
function dbug($var){
    echo '<pre>'.print_r($var, true).'</pre>';
}

/**Create Custom Post Type for Deer Tests */
function create_deer_tests_cpt() {
    $labels = array(
        'name'                  => _x('Deer Tests', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Deer Test', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Deer Tests', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Deer Test', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Deer Test', 'textdomain'),
        'new_item'              => __('New Deer Test', 'textdomain'),
        'edit_item'             => __('Edit Deer Test', 'textdomain'),
        'view_item'             => __('View Deer Test', 'textdomain'),
        'all_items'             => __('All Deer Tests', 'textdomain'),
        'search_items'          => __('Search Deer Tests', 'textdomain'),
        'not_found'             => __('No Deer Tests found.', 'textdomain'),
        'not_found_in_trash'    => __('No Deer Tests found in Trash.', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'deer-tests'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-format-aside',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('deer_tests', $args);
}
add_action('init', 'create_deer_tests_cpt');

