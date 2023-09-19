<?php get_header(); ?>
<?php the_post();?>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 single-content">
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
                <div class="col-lg-4 ml-auto">
                    <div class="section-title">
                        <h2>Popular Posts</h2>
                    </div>
                    <div class="trend-entry d-flex">
                        <div class="number align-self-start">01</div>
                        <div class="trend-contents">
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <div class="post-meta">
                                <span class="d-block"><a href="blog-single.html#">Dave Rogers</a> in <a
                                        href="blog-single.html#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                        class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="trend-entry d-flex">
                        <div class="number align-self-start">02</div>
                        <div class="trend-contents">
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <div class="post-meta">
                                <span class="d-block"><a href="blog-single.html#">Dave Rogers</a> in <a
                                        href="blog-single.html#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                        class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="trend-entry d-flex">
                        <div class="number align-self-start">03</div>
                        <div class="trend-contents">
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <div class="post-meta">
                                <span class="d-block"><a href="blog-single.html#">Dave Rogers</a> in <a
                                        href="blog-single.html#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                        class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="trend-entry d-flex pl-0">
                        <div class="number align-self-start">04</div>
                        <div class="trend-contents">
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <div class="post-meta">
                                <span class="d-block"><a href="blog-single.html#">Dave Rogers</a> in <a
                                        href="blog-single.html#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                        class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <p>
                        <a href="blog-single.html#" class="more">See All Popular <span
                                class="icon-keyboard_arrow_right"></span></a>
                    </p>
                </div>
        </div>
    </div>

<?php get_footer();
