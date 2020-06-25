<?php
/*
================================================================================================
Embedded Systems - panel-pc.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed when is on front page, home
or index.

@package        Embedded Systems WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Custom Post Type (Arduino Setup)
 2.0 - Custom Post Type (Categories Setup)
 3.0 - Custom Post Type (Tags Setup)
================================================================================================
*/

/*
================================================================================================
 1.0 - Custom Post Type (Themes Setup)
================================================================================================
*/
function embedded_systems_cpt_panel_pc_setup() {
    $labels = array(
        'add_new'       => esc_html__('Add New', 'embedded-systems'),
        'name'          => esc_html__('Panel PCs', 'embedded-systems'),
        'singular_name' => esc_html__('Panel PC', 'embedded-systems'), 
    );
    
    $args = array(
        'labels'        => $labels,
        'has_archive'   => true,
        'hierarchical'  => true,
        'menu_icon'     => 'dashicons-portfolio',
        'menu_position' => 5,
        'public'        => true,
        'show_in_menu'  => true,
        'show_in_nav_menus' => true,
        'show_ui'       => true,
        'supports'      => array('title', 'editor', 'thumbnail', 'page-attributes', 'excerpt'),
        'taxonomies'    => array('panel_pcs_category', 'panel_pcs_tags'),
        'rewrite'       => array('slug' => 'panel-pcs', 'with_front' => false),
    );
    register_post_type('panel-pcs', $args);
}
add_action('init', 'embedded_systems_cpt_panel_pc_setup');

/*
================================================================================================
 2.0 - Custom Post Type (Categories Setup)
================================================================================================
*/
function embedded_systems_cpt_panel_pc_categories_setup() {
    $labels = array(
        'add_new_item' => esc_html__('Add New Categories', 'embedded-systems'),
        'name'          => esc_html__('Categories', 'embedded-systems'),
        'singular_name' => esc_html__('Category', 'embedded-systems'),
    );
    
    $args = array(
        'labels'        => $labels,
        'hierarchical'  => true,
        'public'        => true,
        'show_ui'       => true,
        'show_admin_column'  => true,
    );
    
    register_taxonomy('panel_pcs_category', 'panel-pcs', $args);
}
add_action('init', 'embedded_systems_cpt_panel_pc_categories_setup');

/*
================================================================================================
 3.0 - Custom Post Type (Tags Setup)
================================================================================================
*/
function embedded_systems_cpt_panel_pc_tags_setup() {
    $labels = array(
        'add_new_item' => esc_html__('Add New Tag', 'embedded-systems'),
        'name'          => esc_html__('Tags', 'embedded-systems'),
        'singular_name' => esc_html__('Tag', 'embedded-systems'),
    );
    
    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
    );
    
    register_taxonomy('panel_pcs_tags', 'panel-pcs', $args);
}
add_action('init', 'embedded_systems_cpt_panel_pc_tags_setup');