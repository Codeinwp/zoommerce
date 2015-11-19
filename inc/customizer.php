<?php

//Extra classes
require_once ( 'class/zoommerce_general_control.php');

//Hooks
add_action( 'customize_register', 'zoommerce_customize_remove', 1000 );
add_action( 'customize_register', 'zoommerce_customize_add_existing', 2000 );
add_action( 'customize_register', 'zoommerce_customize_add_new', 1500 );

function zoommerce_customize_remove($wp_customize) {
	include 'customizer/remove.php';
}

function zoommerce_customize_add_existing($wp_customize) {
	include 'customizer/add_existing.php';
}

function zoommerce_customize_add_new($wp_customize) {
	include 'customizer/add_new.php';
}

//Include Zerif Customizer
include get_template_directory() . '/inc/customizer.php';

function zoommerce_registers() {
	wp_enqueue_style( 'zoommerce_customizer_style', get_stylesheet_directory_uri() . '/assets/css/admin-style.css');
	wp_enqueue_script( 'zoommerce_customizer_script', zoommerce_get_file('/assets/js/zoommerce_customizer.js'), array("jquery","jquery-ui-draggable"),'1.0.0', true  );
}

add_action( 'customize_controls_enqueue_scripts', 'zoommerce_registers' );
