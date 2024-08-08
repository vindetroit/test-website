<?php
// Enqueue parent theme styles
function kadence_child_enqueue_styles() {
    wp_enqueue_style('kadence-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'kadence_child_enqueue_styles');

function add_login_logout_links() {
    if (is_user_logged_in()) {
        $logout_url = wp_logout_url(home_url());
        echo '<a href="' . esc_url($logout_url) . '">Logout</a>';
    } else {
        $login_url = wp_login_url();
        echo '<a href="' . esc_url($login_url) . '">Login</a>';
    }
}

add_action('kadence_header', 'add_login_logout_links');
