<?php
function chrmp_theme_setup(){
	// Featured Image Support
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'chrmp_theme_setup');

// Excerpt Length
function set_excerpt_length(){
	return 40;
}

add_filter('excerpt_length', 'set_excerpt_length');

// Widget Locations
function init_widgets($id){
	register_sidebar(array(
		'name'	=> 'Sidebar',
		'id'	=> 'sidebar',
		'before_widget'	=> '<div class="bloga card-blog side-widget"><div class="table" >',
		'after_widget'	=> '</div> </div>',	
		'before_title'	=> '<h4 class="heading-primary">',
		'after_title'	=> '</h4>',
	));
}

add_action('widgets_init', 'init_widgets');


