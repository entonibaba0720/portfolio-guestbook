<?php

/**********************
* scripts
**********************/
function prtf_load_scripts(){

  wp_enqueue_style('prtf_style', plugin_dir_url(__FILE__) . 'css/plugin_style.css');
  wp_enqueue_script( 'prtf_script', plugin_dir_url( __FILE__ ) . '/js/script.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script('jquery-form');
  wp_enqueue_script('json-form');
  wp_localize_script( 'ajax-test', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

}
add_action( 'wp_enqueue_scripts', 'prtf_load_scripts' );
