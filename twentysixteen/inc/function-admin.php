<?php
/*
==========================================
  Admin page
==========================================
  */


  //Integrating options
// //// add_filter('ot_theme_mode', '__return_true');

//Activating Option tree
///require_once(get_template_directory().'/inc/theme-options/option-tree/ot-loader.php');
/**
  * Loads Theme Options
 */
/////////require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

//Hide Documentation Page
//add_filter('ot_show_pages', '__return_false');
//add_filter('ot_show_new_layout', '__return_false');

/*function tarz_add_admin_page(){
  //Write Admin Page
  add_menu_page('Tarzz Theme Options', 'Tarzz', 'manage_options', 'zaheercena', 'tarzz_theme_create_page', 'dashicons-shield-alt', 110);
  //Write Admin Sub Pages
  add_submenu_page( 'zaheercena', 'Tarzz Theme Options', 'General', 'manage_options', 'zaheercena', 'tarzz_theme_create_page' );
  add_submenu_page( 'zaheercena', 'Tarzz CSS Options', 'Custom CSS', 'manage_options', 'zaheercena_css', 'tarzz_theme_settings_page' );
  //Activate Custom Setting
  add_action('admin_init', 'tarzz_custom_settings');
}
//Our Admin Page
add_action('admin_menu', 'tarz_add_admin_page');
//
function tarzz_custom_settings(){
  register_setting( 'tarzz-setting-group', 'first_name' );
  register_setting( 'tarzz-setting-group', 'twitter_handler', 'tarzz_sanitize_twitter_handler' );
  register_setting( 'tarzz-setting-group', 'facebook_handler' );
  register_setting( 'tarzz-setting-group', 'share_handler' );
  register_setting( 'tarzz-setting-group', 'google_handler' );
  add_settings_section( 'tarzz-sidebar-options', 'Sidebar Options', 'tarzz_sidebar_options', 'zaheercena' );
  add_settings_field( 'sidebar-name', 'First Name', 'tarzz_sidebar_name', 'zaheercena', 'tarzz-sidebar-options' );
  add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'tarzz_sidebar_twitter', 'zaheercena', 'tarzz-sidebar-options' );
  add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'tarzz_sidebar_facebook', 'zaheercena', 'tarzz-sidebar-options' );
  add_settings_field( 'sidebar-share', 'Share Handler', 'tarzz_sidebar_share', 'zaheercena', 'tarzz-sidebar-options' );
  add_settings_field( 'sidebar-google', 'Google Handler', 'tarzz_sidebar_google', 'zaheercena', 'tarzz-sidebar-options' );
}
function tarzz_sidebar_options(){
  echo 'Custom Sidebar Information';
}
function tarzz_sidebar_name(){
  $firstName = esc_attr(get_option('first_name'));
  echo '<input type="text" name "first_name" value="'.$firstName.'" placeholder="First Name" />';
}

//Social Media Logo Dynamic
function tarzz_sidebar_twitter(){
  $twitter = esc_attr(get_option('twitter_handler'));
  echo '<input type="text" name "twitter_handler" value="'.$twitter.'" placeholder="@Twitter" />';
}
function tarzz_sidebar_facebook(){
  $facebook = esc_attr(get_option('facebook_handler'));
  echo '<input type="text" name "facebook_handler" value="'.$facebook.'" placeholder="/username" />';
}
function tarzz_sidebar_share(){
  $share = esc_attr(get_option('share_handler'));
  echo '<input type="text" name "share_handler" value="'.$share.'" placeholder="/share" />';
}
function tarzz_sidebar_google(){
  $google = esc_attr(get_option('google_handler'));
  echo '<input type="text" name "google_handler" value="'.$google.'" placeholder="/google" />';
}
//Our Page
function tarzz_theme_create_page(){
  require_once(get_template_directory().'/inc/templates/tarzz-admin.php');
}
//Our Submenu Page
function tarzz_theme_settings_page(){
}

//Sanitization Setting
function tarzz_sanitize_twitter_handler($input){
  $output = sanitize_text_field( $input );
  return $output;
}*/
