<?php 

/*
Plugin Name: Core Shortcodes
Plugin URI: http://mstrends.com/plugins/trend-shortcodes
Description: Enables some most basic shortcodes for WordPress
Version: 1.0
Author: Muhamamd Faisal
Author URI: http://themeforest.net/user/MsTrends
*/


#-----------------------------------------------------------------#
# If this file is called directly, abort.
#-----------------------------------------------------------------# 

    if ( ! defined( 'WPINC' ) ) {
        die;
    }


#-----------------------------------------------------------------#
# Loads the Core Plugin Classes
#-----------------------------------------------------------------# 

    require_once( DIRNAME(__FILE__) . '/inc/class_shortcodes.php' );


#-----------------------------------------------------------------#
# Setup Core Plugin (fires on every page load)
#-----------------------------------------------------------------# 

    function ms_setup_shortcodes() {

        // initiate classes
        new MS_Shortcodes();

    }

    ms_setup_shortcodes();


#-----------------------------------------------------------------#
# Register and Enqueue JS & CSS for Shortcodes
#-----------------------------------------------------------------# 


    function ms_enqueue_shortcodes_scripts() {
        if ( !is_admin() ) {

            // Register CSS
            wp_register_style('shortcodes-style', plugin_dir_url(__FILE__) . 'css/style.css');

            // Enqueue CSS
            wp_enqueue_style('shortcodes-style');


            // Register JS
            wp_register_script('shortcodes-js', plugin_dir_url(__FILE__) . 'js/init.js', 'jquery', null, true);

            // Enqueue JS
            wp_enqueue_script('shortcodes-js');

        }
    }

    add_action( 'wp_enqueue_scripts', 'ms_enqueue_shortcodes_scripts' );