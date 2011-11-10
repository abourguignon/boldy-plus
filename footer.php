 </div>
           <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->
    
    <!-- BEGIN FOOTER -->
    <div id="footer">
    <?php if(get_option('boldy_footer_actions')!="no") {?>
        <div style="width:960px; margin: 0 auto; position:relative;">
            <a href="#" id="showHide" <?php if(get_option('boldy_actions_hide')=="hidden"){echo 'style="background-position:0 -16px"';}?>>
                <?php _e("Show/Hide footer actions", "boldy-plus"); ?>
            </a>
        </div>
        
        <div id="footerActions" <?php if(get_option('boldy_actions_hide')=="hidden"){echo 'style="display:none"';}?>>
            <div id="footerActionsInner">
            <?php if(get_option('boldy_twitter_user')!="" && get_option('boldy_latest_tweet')!="no"){ ?>
                <div id="twitter">
                    <a href="http://twitter.com/<?php echo get_option('boldy_twitter_user'); ?>" class="action">
                        <?php _e("Follow us!", "boldy-plus"); ?>
                    </a>
                    <div id="latest">
                        <div id="tweet">
                            <div id="twitter_update_list"></div>
                        </div>
                        <div id="tweetBottom"></div>
                    </div>
                </div>
                <?php } ?>                    
                <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo get_option('boldy_twitter_user'); ?>.json?callback=twitterCallback2&amp;count=<?php 
                if(get_option('boldy_number_tweets')!=""){
                    echo get_option('boldy_number_tweets');
                    }else{
                        echo "1";
                    } ?>">
                </script>
                <div id="quickContact">
                    <p id="success" class="successmsg" style="display:none;"><?php _e("Your e-mail has been sent. Thank you!", "boldy-plus"); ?></p>
                    <p id="bademail" class="errormsg" style="display:none;"><?php _e("Please enter your name, a message and a valid e-mail address.", "boldy-plus"); ?></p>
                    <p id="badserver" class="errormsg" style="display:none;"><?php _e("Your e-mail failed. Try again later.", "boldy-plus"); ?></p>
                    
                    <form action="<?php bloginfo('template_url'); ?>/sendmail.php" method="post" id="quickContactForm">
                    <div class="leftSide">
                        <input type="text" value="<?php _e("Your name", "boldy-plus"); ?>" id="quickName" name="name" />
                        <input type="text" value="<?php _e("Your e-mail", "boldy-plus"); ?>" id="quickEmail" name="email" />
                        <input type="submit" name="submit" id="submitinput" value="<?php _e("Send", "boldy-plus"); ?>"/>
                    </div>
                    <div class="rightSide">
                        <textarea id="quickComment" name="comment"><?php _e("Your message", "boldy-plus"); ?></textarea>
                    </div>
                    <input type="hidden" id="quickReceiver" name="receiver" value="<?php echo strhex(get_option('boldy_contact_email')); ?>"/>
                    </form>
                </div>
            </div>
        </div>
        <?php }?>
        <div id="footerWidgets">
            <div id="footerWidgetsInner">
                <!-- BEGIN FOOTER WIDGET -->
                <?php /* Widgetized sidebar */
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?><?php endif; ?>
                <!-- END FOOTER WIDGETS -->
                <!-- BEGIN COPYRIGHT -->
                <div id="copyright">
                    <?php
                        if (get_option('boldy_copyright') <> "")
                        {
                            echo stripslashes(stripslashes(get_option('boldy_copyright')));
                        }
                        else
                        {
                            _e("Just go to Theme options page and edit copyright text", "boldy-plus");
                        }
                    ?> 
                    <!-- Pretty theme made in Site5: http://www.site5.com/ -->
                </div>
                <!-- END COPYRIGHT -->                        
                </div>
                
        </div>
    </div>    
    <!-- END FOOTER -->
</div>
<!-- END MAINWRAPPER -->
<?php if (get_option(' boldy_analytics') <> "") : ?>
<?php echo stripslashes(stripslashes(get_option('boldy_analytics'))); ?>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
