<?php
$slider_check = get_option('slider_check');
$slider_post_cnt = (int)get_option('slider_post_cnt');
if ($slider_post_cnt) {
    $slider_posts = get_posts(array(
        'meta_key' => 'is_slider',
        'posts_per_page' => $slider_post_cnt < 4 ? $slider_post_cnt : 4,
    ));

}
if (($slider_check == "on" and !empty($slider_posts))): ?>

    <div class="site-section py-0">
        <div class="owl-carousel hero-slide owl-style">
            <?php foreach ($slider_posts as $post): ?>
                <?php setup_postdata($post); ?>
                <div class="site-section">
                    <div class="container">
                        <div class="half-post-entry d-block d-lg-flex bg-light">
                            <div class="img-bg"
                                 style="background-image: url('<?php echo the_post_thumbnail_url('full') ?>')"></div>
                            <div class="contents">
                                <span class="caption">Editor's Pick</span>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p class="mb-3"><?php the_content(' '); ?></p>
                                <div class="post-meta">
                                    <span class="d-block"><?php the_author(); _e(  ' in ','meranda'); the_category(', '); ?></span>
                                    <?php echo meranda_post_meta($post->ID);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>


