<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="keywords" content="<?php echo get_option('boldy_keywords'); ?>" />
    <meta name="description" content="<?php echo get_option('boldy_description'); ?>" />

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all">
    <link href="<?php bloginfo('template_directory'); ?>/css/ddsmoothmenu.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory'); ?>/css/prettyphoto.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory'); ?>/css/nivo-slider-custom.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.ddsmoothmenu-2.0.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider-3.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.pretty.photo-3.1.5.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

    <link href="<?php bloginfo('pingback_url'); ?>" rel="pingback">
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php //comments_popup_script(); // off by default ?>
    <?php wp_head(); //plugins use this action hook to add their own scripts, stylesheets, and other functionality ?>
</head>

<body <?php if(is_home()) {
                echo 'id="home"';
            }
            elseif(is_category(get_option('boldy_portfolio')) || post_is_in_descendant_category( get_option('boldy_portfolio')) && !is_single()) {
                echo 'id="portfolio"';
            }
?>>
<!-- BEGINN MAINWRAPPER -->
<div id="mainWrapper">
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN HEADER -->
        <div id="header">
            <!-- BEGIN MAIN MENU -->
            <?php
            if (function_exists('wp_nav_menu')) {
                wp_nav_menu( array('theme_location' => 'main-menu', 'container_id' => 'mainMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu'));
            }
            else {
                primarymenu();
            }
            ?>
            <!-- END MAIN MENU -->

            <!-- BEGIN TOP SEARCH -->
            <div id="topSearch">
                <form id="searchform" action="<?php bloginfo('url'); ?>/" method="get">
                    <input type="submit" value="" id="searchsubmit"/>
                    <input type="text" id="s" name="s" value="<?php _e("Type your search", "boldy-plus"); ?>" />
                </form>
            </div>
            <!-- END TOP SEARCH -->

            <div id="logo">
                <?php if (get_option('boldy_logo_img') != "") : ?>
                <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('boldy_logo_img'); ?>" alt="<?php echo get_option('boldy_logo_alt'); ?>" /></a>
                <?php else : ?>
                <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo bloginfo('template_directory');?>/images/logo.png" alt="<?php echo get_option('boldy_logo_alt'); ?>" /></a>
                <?php endif; ?>
            </div>

            <!-- BEGIN TOP SOCIAL LINKS -->
            <div id="topSocial">
                <ul>
                    <?php if(get_option('boldy_linkedin_link')!=""){ ?>
                    <li><a href="<?php echo get_option('boldy_linkedin_link'); ?>" class="linkedin" title="Join us on LinkedIn!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_linkedin.png" alt="LinkedIn" /></a></li>
                    <?php }?>
                    <?php if(get_option('boldy_twitter_user')!=""){ ?>
                    <li><a href="http://www.twitter.com/<?php echo get_option('boldy_twitter_user'); ?>" class="twitter" title="Follow Us on Twitter!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_twitter.png" alt="Follow Us on Twitter!" /></a></li>
                    <?php }?>
                    <?php if(get_option('boldy_facebook_link')!=""){ ?>
                    <li><a href="<?php echo get_option('boldy_facebook_link'); ?>" class="twitter" title="Join Us on Facebook!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_facebook.png" alt="Join Us on Facebook!" /></a></li>
                    <?php }?>
                    <li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss"><img src="<?php bloginfo('template_directory'); ?>/images/ico_rss.png" alt="Subcribe to Our RSS Feed" /></a></li>
                </ul>
            </div>
            <!-- END TOP SOCIAL LINKS -->
        </div>
        <!-- END HEADER -->

        <!-- BEGIN CONTENT -->
        <div id="content">
