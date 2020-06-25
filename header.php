<?php
/*
================================================================================================
Embedded Systems - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features such s social
navigation.

@package        Embedded Systems WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="http://gmpg.org/xfn/11" rel="profile" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <section id="site-container" class="site-container">
        <div id="site-main" class="site-main">
            <div id="branding-navigation" class="branding-navigation">
                <div id="site-branding" class="site-branding">
                    <?php if (has_custom_logo()) { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/desktop-logo.jpg'); ?>" /></a>
                    <?php } else { ?>
                        <h1 class="site-title"><a href="<?php echo esc_url('http://www.icop.com.tw/'); ?>"><?php bloginfo('name'); ?></a></h1>
                        <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                    <?php } ?>
                </div>
                <div id="main-navigation" class="main-navigation">
                    <?php if (has_nav_menu('primary-navigation')) { ?>
                        <nav id="site-navigation" class="primary-navigation">
                            <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'embedded-systems'); ?></button>
                            <?php wp_nav_menu(array(
                                'theme_location'    => 'primary-navigation',
                                'menu_id'           => 'primary-menu',
                                'menu_class'        => 'nav-menu'   
                            )); 
                            ?>
                        </nav>            
                    <?php } ?>
                </div>
            </div>
            <div id="site-header" class="site-header">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/header-image.png'); ?>" />
            </div>
            <?php breadcrumb_trail(); ?>
            <section id="site-content" class="site-content">