<?php
$home_post_id = get_option('home_post');
if (!empty($home_post_id )):
$post = get_post($home_post_id);
setup_postdata($post); ?>
<div class="py-0 mb-5">
    <div class="container">
        <div class="half-post-entry d-block d-lg-flex bg-light <?php if (empty($featured_posts)) : echo 'mt-5'; endif; ?>">
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
<?php endif;?>