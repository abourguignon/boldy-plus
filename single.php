<?php get_header(); ?>

<!-- Begin #colLeft -->
    <div id="colLeft">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="postItem">
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
            <div class="meta">
                <?php the_time('M j, Y') ?> &nbsp;&nbsp;//&nbsp;&nbsp; <?php _e("by", "boldy"); ?> <span class="author"><?php the_author_link(); ?></span> &nbsp;&nbsp;//&nbsp;&nbsp;  <?php the_category(', ') ?>  &nbsp;//&nbsp;  <?php comments_popup_link('No Comments', '1 Comment ', '% Comments'); ?> 
            </div>
            <?php the_content(__('Read more')); ?> 
            
            <div class="postTags"><?php the_tags(); ?></div>
            
            <?php if (get_option('boldy_share_shortcut') != "no") : ?>
            <div id="shareLinks">
                <a href="#" class="share">[+] Share &amp; Bookmark</a>
                <span id="icons">
                    <a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>" title="<?php _e("Tweet this!", "boldy"); ?>">
                    <!--<img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Tweet this!" />-->&#8226; Twitter</a>                
                    <a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="<?php _e("StumbleUpon", "boldy"); ?>">
                    <!--<img src="<?php bloginfo('template_directory'); ?>/images/stumbleupon.png" alt="StumbleUpon" />-->&#8226; StumbleUpon</a>
                    <a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="<?php _e("Digg this!", "boldy"); ?>">
                    <!--<img src="<?php bloginfo('template_directory'); ?>/images/digg.png" alt="Digg This!" />-->&#8226; Digg</a>                
                    <a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="<?php _e("Bookmark on Delicious", "boldy"); ?>">
                    <!--<img src="<?php bloginfo('template_directory'); ?>/images/delicious.png" alt="Bookmark on Delicious" />-->&#8226; Delicious</a>
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>" title="<?php _e("Share on Facebook", "boldy"); ?>">
                    <!--<img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Share on Facebook" id="sharethis-last" />-->&#8226; Facebook</a>
                </span>
            </div>
            <?php endif; ?>
        
        <?php comments_template(); ?>
        </div>
        <?php endwhile; else: ?>

        <p><?php _e("Sorry, but you are looking for something that isn't here.", "boldy"); ?></p>

    <?php endif; ?>
        
    </div>
<!-- End #colLeft -->

<?php get_sidebar(); ?>    

<?php get_footer(); ?>
