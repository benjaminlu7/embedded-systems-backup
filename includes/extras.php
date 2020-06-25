<?php
/*
================================================================================================
Embedded Systems - extras.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for 
a theme. This extras.php template file allows you to add additional features and functionality to 
a WordPress theme which is stored in the extras folder and its called in the functions.php

@package        Embedded Systems WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Pingback Setup
 2.0 - Post Thumbnail Setup
 3.0 - Excerpt Length Setup
================================================================================================
*/

/*
================================================================================================
 1.0 - Pingback Setup
================================================================================================
*/
function embedded_systems_pingback_setup() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
	}
}
add_action('wp_head', 'embedded_systems_pingback_setup');
/*
================================================================================================
 2.0 - Post Thumbnail Setup
================================================================================================
*/
function embedded_systems_unset_has_post_thumbnail($classes) {
    $class_key = array_search('has-post-thumbnail', $classes);
    if (is_singular() || is_post_type_archive('products')) {
        unset($classes[$class_key]);
    }     
    return $classes;
}
add_filter('post_class', 'embedded_systems_unset_has_post_thumbnail');

/*
================================================================================================
 3.0 - Excerpt Length Setup
================================================================================================
*/
function embedded_systems_excerpt_length_setup() {
    return 50;
}
add_filter('excerpt_length', 'embedded_systems_excerpt_length_setup');

if (function_exists('breadcrumb_trail')) { 
    function embedded_systems_breadcrumb_trail_labels_setup($labels) {
        $labels['browse'] = 'You are Here:';
        
        return $labels;
    }
    add_filter('breadcrumb_trail_labels', 'embedded_systems_breadcrumb_trail_labels_setup');
    
     function embedded_systems_breadcrumb_trail_inline_styles_setup($style) {
        $style = '
            .breadcrumbs {
                padding: 0.2em 0;
            }
            
            .breadcrumbs .trail-browse,
            .breadcrumbs .trail-items,
            .breadcrumbs .trail-items li {
                background:  transparent;
                border: none;
                color: #000000;
                display: inline-block;
                margin: 0;
                padding: 0;
                text-indent: 0;
            }

            .breadcrumbs .trail-browse {
                color: #000000;
                font-size: inherit;
                font-style: inherit;
                font-weight: inherit;
                margin-right: 5px;
            }

            .breadcrumbs .trail-items {
                list-style: none;
            }
            
            .breadcrumbs .trail-items span {
                color: #000000;
            }

            .trail-items li::after {
                color: #000000;
                content: "\f061";
                font-family: "FontAwesome";
                padding: 0 0.5em;
            }

            .trail-items li:last-of-type::after {
                display: none;
            }';
        return $style;
    }
    add_filter('breadcrumb_trail_inline_style', 'embedded_systems_breadcrumb_trail_inline_styles_setup');
}