<?php get_header(); ?>

<?php get_template_part('template-parts/home_slider'); ?>

<?php get_template_part( 'template-parts/featured_posts'); ?>

<?php get_template_part( 'template-parts/main_post'); ?>

<?php get_template_part( 'template-parts/home_category_post'); ?>

    <div class="site-section <?php if ((!empty($home_category1_post) and !empty($home_category2_post))) { echo 'py-0'; } else {echo 'py-2';} ?> ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="section-title">
                        <h2><?php _e('All Stories','meranda');?></h2>
                    </div>
                    <?php if ( have_posts()) : while ( have_posts()) : the_post();?>
                        <?php get_template_part('template-parts/content');?>
                    <?php endwhile;?>
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
    <div class="site-section subscribe bg-light">
        <div class="container">
            <form action="index.html#" class="row align-items-center">
                <div class="col-md-5 mr-auto">
                    <h2>Newsletter Subcribe</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis
                        pariatur obcaecati possimus nisi ea iste!</p>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="d-flex">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button type="submit" class="btn btn-secondary"><span class="icon-paper-plane"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>
