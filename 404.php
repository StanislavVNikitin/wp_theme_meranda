<?php get_header(); ?>

    <div class="site-section py-3">
        <div class="container py-3">
            <div class="single-content">
                <header class="page-header py-3">
                <h1 class="page-title py-3"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'meranda' ); ?></h1>
            </header><!-- .page-header -->
                <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'meranda' ); ?></p>

                <?php

                the_widget( 'WP_Widget_Recent_Posts' );
                ?>

                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'meranda' ); ?></h2>
                    <ul>
                        <?php
                        wp_list_categories(
                            array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            )
                        );
                        ?>
                    </ul>
                </div><!-- .widget -->

                <?php
                /* translators: %1$s: smiley */
                $meranda_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'meranda' ), convert_smilies( ':)' ) ) . '</p>';
                the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$meranda_archive_content" );

                the_widget( 'WP_Widget_Tag_Cloud' );
                ?>

            </div><!-- .page-content -->
            </div>
        </div>
    </div>

		<section class="error-404 not-found">

<?php get_footer();