<?php

function slider_admin_script() {
    if (is_admin()) {
        wp_enqueue_style('admin-style', get_template_directory_uri() . '/slider/assets/css/style.css', array());
        wp_enqueue_script('admin-script', get_template_directory_uri() . '/slider/assets/js/script.js', array('jquery' , 'jquery-ui-sortable'), 0.1, TRUE);
    }
}

add_action('admin_enqueue_scripts', 'slider_admin_script' );