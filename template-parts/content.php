<div class="post-entry-2 d-flex">
    <div class="thumbnail order-md-2"
         style="background-image: url(<?php the_post_thumbnail_url('full');?>)"></div>
    <div class="contents order-md-1 pl-0">
        <h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
        <?php the_content('');?>
        <div class="post-meta">
            <span class="d-block"><?php the_author(); _e(  ' in ','meranda'); the_category(', '); ?></span>
            <?php echo meranda_post_meta($post->ID);?>
        </div>
    </div>
</div>
