<?php 

/*

	1. Link to CSS
	2. Link to JS
	3. Enable Menus
	4. Create Custom Menu
	5. Create Widget Areas

*/

// Load the Theme CSS
function theme_styles() {	

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );	
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );	
	wp_enqueue_style( 'scrolling_nav_css', get_template_directory_uri() . '/css/scrolling-nav.css' );	
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// Load the Theme JS
function theme_js() {

	global $wp_scripts;
	
	wp_register_script( 'html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );
	
	$wp_scripts->add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery','bootstrap_js'), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );


// Enable custom menus
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


require_once('wp_bootstrap_navwalker.php');

// Create a custom menus
function register_theme_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'dropdown-menu' => __( 'Dropdown Menu' ),
    )
  );
}
add_action( 'init', 'register_theme_menus' );

//add_filter('show_admin_bar', '__return_false');

// Function for creating Widegets
function create_widget($name, $id, $description) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

// Create widgets in the footer
create_widget("Page Sidebar", "page", "Displays in the side navigation of pages");
create_widget("Blog Sidebar", "blog", "Displays in the side navigation of blog posts and main blog page");

create_widget("Footer Area", "footer", "Displays in bottom footer");

create_widget("Front Page Left", "front-left", "Displays on the left hand side of the homepage");
create_widget("Front Page Center", "front-center", "Displays in the center of the homepage");
create_widget("Front Page Right", "front-right", "Displays on the right hand side of the homepage");


?>