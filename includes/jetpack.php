<?php
function embedded_systems_jetpack_setup() {
    add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'embedded_systems_jetpack_setup' );