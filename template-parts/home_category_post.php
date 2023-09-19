<?php
$home_category1_id = get_option('home_category1');
$home_category2_id = get_option('home_category2');
$home_category_post_cnt = get_option('home_category_post_cnt');
$home_categories_posts=[];
$home_categories=[];
if ((!empty($home_category1_id) and !empty($home_category1_id))) {
    if ($home_category1_id ) {
        $home_category1 = get_category($home_category1_id );
        $home_category1_post = get_posts(array(
            'category'    => $home_category1_id,
            'posts_per_page' => $home_category_post_cnt,
        ));
        $home_categories[] = $home_category1;
        $home_categories_posts[] = $home_category1_post;

    }
    if ($home_category2_id) {
        $home_category2 = get_category($home_category2_id );
        $home_category2_post = get_posts(array(
            'category'    => $home_category2_id,
            'posts_per_page' => $home_category_post_cnt,
        ));
        $home_categories[] = $home_category2;
        $home_categories_posts[] = $home_category2_post;
    }
}

if ($home_category_post_cnt and (!empty($home_category1_post) and !empty($home_category2_post))): ?>
<div class="site-section py-0">
    <div class="container">
        <div class="row">
            <?php foreach ($home_categories_posts as $home_category_posts):?>
            <?php $home_category = array_shift($home_categories); ?>
                <div class="col-lg-6">
                <div class="section-title">
                    <h2><?php echo $home_category->name;?></h2>
                </div>
                <?php foreach ($home_category_posts as $post): setup_postdata($post)?>
                    <div class="post-entry-2 d-flex">
                    <div class="thumbnail"
                         style="background-image: url(<?php echo the_post_thumbnail_url('full') ?>)"></div>
                    <div class="contents">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_content(''); ?>
                        <div class="post-meta">
                            <span class="d-block"><?php the_author(); _e(  ' in ','meranda'); the_category(', '); ?></span>
                            <?php echo meranda_post_meta($post->ID);?>
                        </div>
                    </div>
                </div>
                <?php endforeach; wp_reset_postdata();?>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php