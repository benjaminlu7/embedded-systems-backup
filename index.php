<?php
/*
================================================================================================
Embedded Systems - index.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Embedded Systems WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="content-area" class="content-area">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('embedded-systems-small-thumbnails'); ?></a>
                    </div>
                    <header class="entry-header">
                        <span class="entry-timestamp"><?php echo embedded_systems_entry_time_stamp_setup(); ?></span>
                        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
                    </header>
                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
                        <div class="continue-reading">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                <?php
                                    printf(
                                        wp_kses(__('Continue reading %s', 'embedded-systems'), array('span' => array('class' => array()))),
                                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                                    );
                                ?>
                            </a>
                        </div>
                    </div>
                </article>
        <?php endwhile; ?>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <article id="post-0" <?php post_class('post'); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">
                        <?php if (is_404()) {
                            esc_html_e('Page Not Available', 'embedded-systems');
                        } else if (is_search()) {
                            printf(__('Nothing found for: <small>', 'embedded-systems') . get_search_query() . '</small>');
                        } else {
                            esc_html_e('Nothing Found', 'embedded-systems');
                        }
                        ?>
                    </h1>
                </header>
                <div class="entry-content">
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'embedded-systems' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
                    <?php elseif (is_404()) : ?>
                        <p><?php esc_html_e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'embedded-systems' ); ?></p>
                        <?php get_search_form(); ?>
                    <?php elseif (is_search()) : ?>
                        <p><?php esc_html_e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'embedded-systems' ); ?></p>
                        <?php get_search_form(); ?>
                    <?php else : ?>
                        <p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'embedded-systems' ); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </article>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>