<?php get_header(); ?>
<?php if (is_category(get_option('boldy_portfolio')) || post_is_in_descendant_category( get_option('boldy_portfolio'))) : ?>
<?php include (TEMPLATEPATH . '/portfolio.php'); ?>
<?php else : ?>

        <!-- Begin #colLeft -->
        <div id="colLeft">
        <!-- archive-title -->
                        <?php if(is_month()) { ?>
                        <div id="archive-title">
                        <?php _e("Browsing articles from", "boldy-plus"); ?> "<strong><?php the_time('F, Y') ?></strong>"
                        </div>
                        <?php } ?>
                        <?php if(is_category()) { ?>
                        <div id="archive-title">
                        <?php _e("Browsing articles in", "boldy-plus"); ?> "<strong><?php $current_category = single_cat_title("", true); ?></strong>"
                        </div>
                        <?php } ?>
                        <?php if(is_tag()) { ?>
                        <div id="archive-title">
                        <?php _e("Browsing articles tagged with", "boldy-plus"); ?> "<strong><?php wp_title('',true,''); ?></strong>"
                        </div>
                        <?php } ?>
                        <?php if(is_author()) { ?>
                        <div id="archive-title">
                        <?php _e("Browsing articles by", "boldy-plus"); ?> "<strong><?php wp_title('',true,''); ?></strong>"
                        </div>
                        <?php } ?>
                    <!-- /archive-title -->
                    
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>        
        
        <!-- Begin .postBox -->
        <div class="postItem">
        
                <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
                <div class="meta">
                    <?php the_time('M j, Y') ?> &nbsp;&nbsp;//&nbsp;&nbsp; 
                    <?php _e("by", "boldy-plus"); ?> 
                    <span class="author"><?php the_author_link(); ?></span> &nbsp;&nbsp;//&nbsp;&nbsp;  
                    <?php the_category(', ') ?>  &nbsp;//&nbsp;  
                    <?php comments_popup_link(__('No comments', 'boldy-plus'), __('1 comment', 'boldy-plus'), __('% comments', 'boldy-plus')); ?> 
                </div>
                <?php the_content(__('Read more').'&raquo;'); ?>
                
        </div>
        
        <!-- End .postBox -->
        
        <?php endwhile; ?>

    <?php else : ?>

        <p><?php _e("Sorry, but you are looking for something that isn't here.", "boldy-plus"); ?></p>

    <?php endif; ?>
            <!--<div class="navigation">
                        <div class="alignleft"><?php next_posts_link() ?></div>
                        <div class="alignright"><?php previous_posts_link() ?></div>
            </div>-->
            <?php 
            if (function_exists("emm_paginate")) {
                emm_paginate();
            } 
            ?>

        </div>
        <!-- End #colLeft -->

<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>
