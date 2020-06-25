<?php
/*
================================================================================================
Embedded Systems - enjoy-printer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the requirements to 
display widgets on the bottom of the page. This is the footer sidebar that is assigned in the 
widget area in the customizer and widget area.

@package        Embedded Systems WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/
?>
<div id="widget-area" class="widget-area">
    <aside id="enjoy-printer" class="widget enjoy-printer">
        <?php the_post_thumbnail('embedded-systems-medium-thumbnails'); ?>
        <div class="wp-caption"><div class="wp-caption-text"><?php the_post_thumbnail_caption(); ?></div></div>
    </aside>
    <?php dynamic_sidebar('ppc-090t'); ?>
</div>