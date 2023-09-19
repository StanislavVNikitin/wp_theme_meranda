<?php get_header(); ?>
<?php the_post();?>

    <div class="site-section">
    <div class="container">
            <div class="col-lg-12 single-content">
                <?php if(the_post_thumbnail()): ?>)
                    <p class="mb-5">
                        <img src="<?php the_post_thumbnail_url('full');?>" alt="Image" class="img-fluid">
                    </p>
                <?php endif;?>
                <h1 class="mb-4">
                    <?php the_title();?>
                </h1>
                <div class="post-meta d-flex mb-5">
                    <div class="bio-pic mr-3">
                        <?php echo meranda_get_avatar();?>
                    </div>
                    <div class="vcard">
                        <span class="d-block"><?php the_author(); _e(  ' in ','meranda'); the_category(', '); ?></span>
                        <span <?php echo meranda_post_meta($post->ID,true);?>
                    </div>
                </div>
                <?php the_content();?>
            </div>
    </div>
    </div>

<?php get_footer();

