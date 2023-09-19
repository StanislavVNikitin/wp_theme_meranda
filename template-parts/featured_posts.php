<?php

$main_post_cnt = (int)get_option('main_post_cnt');
if ($main_post_cnt) {
    $featured_posts = get_posts(array(
        'meta_key' => 'is_featured',
        'posts_per_page' => $main_post_cnt < 4 ? $main_post_cnt : 4,
    ));
    if (count($featured_posts) > 1) {
        $main_featured_post = array_shift($featured_posts);
    }
}
$trending_post = get_posts(array(
    'meta_key' => 'is_trending',
    'posts_per_page' => 4,
));
$trending_post_count = 0;
?>
<?php if (!empty($featured_posts)) : ?>
    <div class="site-section py-2">
        <div class="container">
            <div class="row">
                <div class="<?php echo (!empty($trending_post)) ? 'col-lg-8' : 'col-lg-12' ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2><?php _e('Featured posts','meranda');?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (!isset($main_featured_post))://всего 1 пост в избранном ?>
                            <div class="col-md-12">
                                <?php $post = $featured_posts[0];
                                setup_postdata($post); ?>
                                <div class="post-entry-1">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="thumbnail"
                                             style="background-image: url(<?php echo the_post_thumbnail_url('full') ?>); height: 250px;"></div>
                                    </a>
                                    <div class="contents mt-3">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <?php the_content(''); ?>
                                        <div class="post-meta">
                                        <span class="d-block"><?php the_author(); ?> in <?php the_category(', ');?>></span>
                                            <?php echo meranda_post_meta($post->ID);?>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        <?php else: // Более одного поста?>
                            <div class="col-md-6">
                                <?php $post = $main_featured_post;
                                setup_postdata($post); ?>
                                <div class="post-entry-1">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="thumbnail"
                                             style="background-image: url(<?php echo the_post_thumbnail_url('full') ?>); height: 200px;"></div>
                                    </a>
                                    <div class="contents mt-3">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <?php the_content(''); ?>
                                        <div class="post-meta">
                                    <span class="d-block"><?php the_author(); ?> in <?php the_category(', ');?></span>
                                            <?php echo meranda_post_meta($post->ID);?>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php foreach ($featured_posts as $post): setup_postdata($post)?>
                                    <div class="post-entry-2 d-flex">
                                        <div class="thumbnail"
                                             style="background-image: url(<?php echo the_post_thumbnail_url('full') ?>); "></div>
                                        <div class="contents">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                                            <div class="post-meta">
                                        <span class="d-block"><?php the_author(); ?> in <?php the_category(', ');?></span>
                                                <?php echo meranda_post_meta($post->ID);?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; wp_reset_postdata();?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <?php if (!empty($trending_post)) : ?>
                <div class="col-lg-4">
                    <div class="section-title">
                        <h2><?php _e('Trending','meranda');?></h2>
                    </div>
                    <?php foreach ($trending_post as $post): setup_postdata($post)?>
                        <div class="trend-entry d-flex">
                        <div class="number align-self-start"><?php echo '0' . ++$trending_post_count ?></div>
                        <div class="trend-contents">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="d-block"><?php the_author(); ?> in <?php the_category(', ');?></span>
                                <?php echo meranda_post_meta($post->ID);?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; wp_reset_postdata();?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
<?php endif; ?>
