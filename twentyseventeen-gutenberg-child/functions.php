<?php
function twenty_seventeen_gutenberg_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyseventeen-style' for the Twenty Seventeen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'twenty_seventeen_gutenberg_enqueue_styles' );
// Font size options
function mytheme_setup_theme_supported_features() {
	add_theme_support( 'editor-font-sizes', array(
	    array(
		'name' => __( 'extra small', 'themeLangDomain' ),
		'shortName' => __( 'xs', 'themeLangDomain' ),
		'size' => 10,
		'slug' => 'extrasmall'
	    ),
	    array(
		'name' => __( 'small', 'themeLangDomain' ),
		'shortName' => __( 's', 'themeLangDomain' ),
		'size' => 12,
		'slug' => 'extrasmall'
	    ),
	    array(
		'name' => __( 'regular', 'themeLangDomain' ),
		'shortName' => __( 'R', 'themeLangDomain' ),
		'size' => 16,
		'slug' => 'regular'
	    ),
	    array(
		'name' => __( 'medium', 'themeLangDomain' ),
		'shortName' => __( 'M', 'themeLangDomain' ),
		'size' => 24,
		'slug' => 'medium'
	    ),

	    array(
		'name' => __( 'large', 'themeLangDomain' ),
		'shortName' => __( 'L', 'themeLangDomain' ),
		'size' => 28,
		'slug' => 'large'
	    ),
	    array(
		'name' => __( 'larger', 'themeLangDomain' ),
		'shortName' => __( 'XL', 'themeLangDomain' ),
		'size' => 36,
		'slug' => 'larger'
	    )
	) );

	// Add Pitzer Orange to the color palette block
	add_theme_support( 'editor-color-palette', array(
	    array(
		'name' => __( 'Pitzer Orange', 'themeLangDomain' ),
		'slug' => 'pitzer-orange',
		'color' => '#f7941d',
	    ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );


// blacklist blocks
function my_plugin_blacklist_blocks() {
    wp_enqueue_script(
        'my-plugin-blacklist-blocks',
        plugins_url( 'my-plugin.js', __FILE__ ),
        array( 'wp-blocks' )
    );
}
add_action( 'enqueue_block_editor_assets', 'my_plugin_blacklist_blocks' );
