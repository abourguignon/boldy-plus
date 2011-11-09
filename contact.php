<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#contact').ajaxForm(function(data) {
        if (data==1) {
            $('#success').fadeIn("slow");
            $('#bademail').fadeOut("slow");
            $('#badserver').fadeOut("slow");
            $('#contact').resetForm();
        }
        else if (data==2) {
            $('#badserver').fadeIn("slow");
        }
        else if (data==3) {
            $('#bademail').fadeIn("slow");
        }
    });
});
</script>

<!-- begin colLeft -->
    <div id="colLeft">
        <h1>Contact Us</h1>
        <p><?php echo stripslashes(stripslashes(get_option('boldy_contact_text')))?></p>

        <p id="success" class="successmsg" style="display:none;"><?php _e("Your e-mail has been sent. Thank you!", "boldy"); ?></p>

        <p id="bademail" class="errormsg" style="display:none;"><?php _e("Please enter your name, a message and a valid e-mail address.", "boldy"); ?></p>
        <p id="badserver" class="errormsg" style="display:none;"><?php _e("Your e-mail failed. Try again later.", "boldy"); ?></p>

        <form id="contact" action="<?php bloginfo('template_url'); ?>/sendmail.php" method="post">
        <label for="name"><?php _e("Your name", "boldy"); ?>: *</label>
            <input type="text" id="nameinput" name="name" value=""/>
        <label for="email"><?php _e("Your e-mail", "boldy"); ?>: *</label>

            <input type="text" id="emailinput" name="email" value=""/>
        <label for="comment"><?php _e("Your message", "boldy"); ?>: *</label>
            <textarea cols="20" rows="7" id="commentinput" name="comment"></textarea><br />
        <input type="submit" id="submitinput" name="submit" class="submit" value="<?php _e("Send message", "boldy"); ?>"/>
        <input type="hidden" id="receiver" name="receiver" value="<?php echo strhex(get_option('boldy_contact_email')); ?>"/>
        </form>
    </div>
    <!-- end colleft -->

            <?php get_sidebar(); ?>

<?php get_footer(); ?>
