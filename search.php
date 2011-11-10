<?php get_header(); ?>
    
        <!-- Begin #colLeft -->
        <div id="colLeft">

        <div id="archive-title">
        Search results for "<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; echo '<strong>'.$key.'</strong>'; wp_reset_query(); ?>"
        </div>
                        
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="postItem">
        
                <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
                <div class="meta">
                    <?php the_time('M j, Y') ?> &nbsp;&nbsp;//&nbsp;&nbsp; 
                    <?php _e("by", "boldy-plus"); ?> 
                    <span class="author"><?php the_author_link(); ?></span> &nbsp;&nbsp;//&nbsp;&nbsp;  
                    <?php the_category(', ') ?>  &nbsp;//&nbsp;  
                    <?php comments_popup_link(__('No comments', 'boldy-plus'), __('1 comment', 'boldy-plus'), __('% comments', 'boldy-plus')); ?> 
                </div>
                <?php the_excerpt(); ?> 
                
        </div>
        
        <?php endwhile; ?>

    <?php else : ?>
        <p>Sorry, but you are looking for something that isn't here.</p>
    <?php endif; ?>
            <!--<div class="navigation">
                        <div class="alignleft"><?php next_posts_link() ?></div>
                        <div class="alignright"><?php previous_posts_link() ?></div>
            </div>-->
            <?php if (function_exists("emm_paginate")) {
                emm_paginate();
            } ?>
        </div>
        <!-- End #colLeft -->

<?php get_sidebar(); ?>    

<?php get_footer(); ?>
