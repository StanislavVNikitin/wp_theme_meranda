<?php
$slider_check = get_option('slider_check');
$slider_post1_id = get_option('home_slider_post1');
$slider_post2_id = get_option('home_slider_post2');
$slider_posts = [];
if (($slider_check == "on" and !empty($slider_post1_id) and !empty($slider_post2_id))) {
    if ($slider_post1_id) {
        $slider_post1 = get_post($slider_post1_id);
        $slider_posts[] = $slider_post1;
    }
    if ($slider_post2_id) {
        $slider_post2 = get_post($slider_post2_id);
        $slider_posts[] = $slider_post2;
    }
}
if (($slider_check == "on" and !empty($slider_post1) and !empty($slider_post2))): ?>
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
                                    <span class="d-block"><?php the_author() ?> in <?php the_category(', '); ?></span>
                                    <?php echo meranda_post_meta($post->ID);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php wp_reset_postdata(); endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<?php

$main_post_cnt = (int)get_option('main_post_cnt');
if ($main_post_cnt) {
    $featured_posts = get_posts(array(
        'meta_key' => 'is_featured',
        'posts_per_page' => $main_post_cnt < 4 ? $main_post_cnt : 4,
    ));
    echo count($featured_posts);
    if (count($featured_posts) > 1) {
        $main_featured_post = array_shift($featured_posts);
    }
}
?>

