<?php get_header(); ?>

<!-- BEGIN SLIDER -->
<div id="slider">
    <?php
    if (get_option('boldy_slider') != "") {
        $page_data = get_page(get_option('boldy_slider'));
        $content = $page_data->post_content;
        echo $page_data->post_content;
    }
    else {
    ?>

    <div class="example-slice">
        <p>
            <?php _e("This is the slider. In order to have items here you need to
            create a page in which to insert the images, simply one after
            another, setting up the link to point at (if necessary) and
            text captions in the Title field. Then select the page as the
            \"slider page\" in the Theme Options Page. Make sure your images
            are 960*370px.", "boldy-plus"); ?>
        </p>
    </div>
    <?php
    }
    ?>
</div>
<div style="width:960px; margin:0 auto; background:url(<?php bloginfo('template_directory'); ?>/images/bk_shadow_slider.png) 0 0 no-repeat; height:50px;"></div>
<!-- END SLIDER -->

<!-- BEGIN BLURB -->
<?php if (get_option('boldy_blurb_enable') == "yes" && get_option('boldy_blurb_text') != "") : ?>
<div id="blurb">
    <p>
        <a href="<?php
        if (get_option('boldy_blurb_page') != "") {
            echo get_permalink(get_option('boldy_blurb_page'));
        }
        elseif (get_option('boldy_blurb_link') != "") {
            echo get_option('boldy_blurb_link');
        }
        ?>">
            <img src="<?php bloginfo('template_directory'); ?>/images/but_blurb.png" alt="Blurb" />
        </a>
        <?php echo get_option('boldy_blurb_text'); ?>
    </p>
</div>
<?php endif; ?>
<!-- END BLURB -->

<!-- BEGIN HOME CONTENT -->
<!-- begin home news -->
<?php
if (get_option('boldy_home_news_boxes') == 'yes') {
    query_posts('posts_per_page=3');

    if (have_posts())     {
        ?>
        <div id="homeBoxes" class="clearfix">
        <?php
        $boxNumber = 0;
        while (have_posts()) {
            $boxNumber++;
            the_post();
            ?>
            <div class="homeBox<?php if ($boxNumber == 3) : ?> last<?php endif; ?>">
                <h2><?php the_title(); ?></h2>

                <div class="meta">
                <?php the_time('h\hm'); ?> &nbsp;&nbsp;//&nbsp;&nbsp; <?php _e('by', 'boldy-plus'); ?> <span class="author"><?php the_author_link(); ?></span>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                <p>
                    <?php the_post_thumbnail(); ?>
                </p>
                <?php endif; ?>

                <?php the_excerpt(); ?>
                <a class="more-link" href="<?php the_permalink(); ?>">
                    <?php _e("Read more", "boldy-plus"); ?> &raquo;
                </a>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }
}
?>
<!-- end home news -->

<!-- begin home boxes -->
<?php
$box1=get_post(get_option('boldy_home_box1'));
$box2=get_post(get_option('boldy_home_box2'));
$box3=get_post(get_option('boldy_home_box3'));
?>

<?php if(get_option('boldy_home_box1')!= null && get_option('boldy_home_box2')!= null && get_option('boldy_home_box3')!= null) : ?>
<div id="homeBoxes" class="clearfix">
    <div class="homeBox">
        <h2><?php echo $box1->post_title?></h2>

        <?php if (has_post_thumbnail($box1->ID)) : ?>
        <p>
            <?php echo get_the_post_thumbnail($box1->ID); ?>
        </p>
        <?php endif; ?>
        <?php echo apply_filters('the_content', $box1->post_excerpt);?>
        <a class="more-link" href="<?php echo get_option('boldy_home_box1_link')?>">
            <?php _e("Read more", "boldy-plus"); ?> &raquo;
        </a>
    </div>
    <div class="homeBox">
        <h2><?php echo $box2->post_title?></h2>
        <?php if (has_post_thumbnail($box2->ID)) : ?>
            <p>
                <?php echo get_the_post_thumbnail($box2->ID); ?>
            </p>
        <?php endif; ?>
        <?php echo apply_filters('the_content', $box2->post_excerpt);?>
        <a class="more-link" href="<?php echo get_option('boldy_home_box2_link')?>">
            <?php _e("Read more", "boldy-plus"); ?> &raquo;
        </a>
    </div>
    <div class="homeBox last">
        <h2><?php echo $box3->post_title?></h2>
        <?php if (has_post_thumbnail($box3->ID)) : ?>
            <p>
                <?php echo get_the_post_thumbnail($box3->ID); ?>
            </p>
        <?php endif; ?>
        <?php echo apply_filters('the_content', $box3->post_excerpt);?>
        <a class="more-link" href="<?php echo get_option('boldy_home_box3_link')?>">
            <?php _e("Read more", "boldy-plus"); ?> &raquo;
        </a>
    </div>
</div>
<?php endif; ?>
<!-- end home boxes -->
<!-- END HOME CONTENT -->

<!-- SLIDER SETTINGS -->
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect:'fold', //Specify sets like: 'fold,fade,sliceDown'
            slices:1, //Default: 15 (but kinda greedy with resources)
            animSpeed:500,
            pauseTime:3000,
            startSlide:0, //Set starting Slide (0 index)
            directionNav:true, //Next & Prev
            directionNavHide:true, //Only show on hover
            controlNav:true, //1,2,3...
            controlNavThumbs:false, //Use thumbnails for Control Nav
            controlNavThumbsFromRel:false, //Use image rel for thumbs
            controlNavThumbsSearch: '.jpg', //Replace this with...
            controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
            keyboardNav:true, //Use left & right arrows
            pauseOnHover:true, //Stop animation while hovering
            manualAdvance:false, //Force manual transitions
            captionOpacity:0.8, //Universal caption opacity
            beforeChange: function(){},
            afterChange: function(){},
            slideshowEnd: function(){} //Triggers after all slides have been shown
        });
    });
</script>

<?php get_footer(); ?>
