<?php get_header(); ?>
<?php $category = get_queried_object();
    $cat_id = $category->term_id;
    $cat_name = $category->name;
?>
<div class="site-section">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="section-title">
                        <h2><?php _e('All Stories','meranda');?></h2>
                    </div>
                    <?php if ( have_posts()) : while ( have_posts()) : the_post();?>
                        <?php get_template_part('template-parts/content');?>
                    <?php endwhile; ?>
                        <?php the_posts_pagination(array(
                            'type' => 'list',
                            'prev_next'    => false,
                            'prev_text'    => __('«'),
                            'next_text'    => __('»'),
                            'class'=> 'custom-pagination',
                        ));?>

                    <?php else: ?>
                        <p><?php _e('No entries', 'meranda');?></p>
                    <?php endif;?>

                </div>
                <?php get_sidebar();?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>
