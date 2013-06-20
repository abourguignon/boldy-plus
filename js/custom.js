$(document).ready(function(){

// DROPDOWN MENU INIT
ddsmoothmenu.init({
    mainmenuid: "mainMenu", //menu DIV id
    orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
    classname: 'ddsmoothmenu', //class added to menu's outer DIV
    //customtheme: ["#1c5a80", "#18374a"],
    contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

// PRETTY PHOTO INIT
$("a[rel^='prettyPhoto']").prettyPhoto();

// SHOW/HIDE FOOTER ACTIONS
$('#showHide').click(function(){
    if ($("#footerActions").is(":hidden")) {
        $(this).css('background-position','0 0');
        $("#footerActions").slideDown("slow");
    }
    else {
        $(this).css('background-position','0 -16px')
        $("#footerActions").slideUp("slow");
    }

    return false;
});

// TOP SEARCH
$('#s').focus(function() {
    $(this).animate({width: "215"}, 300 );
    $(this).val('')
});

$('#s').blur(function() {
    $(this).animate({width: "100"}, 300 );
});

// QUICK CONTACT
$('#quickName').focus(function() {
    $(this).val('');
});

$('#quickEmail').focus(function() {
    $(this).val('');
});

$('#quickComment').focus(function() {
    $(this).val('');
});
$('#quickContactForm').ajaxForm(function(data){
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

// SHARE LINKS
$('#shareLinks a.share').click(function() {
    if ($("#shareLinks #icons").is(":hidden")) {
        $('#shareLinks').animate({width: "625"}, 500 );
        $('#shareLinks #icons').fadeIn();
        $(this).text('[-] Share & Bookmark');
        return false;
    }
    else {
        $('#shareLinks').animate({width: "130"}, 500 );
        $('#shareLinks #icons').fadeOut();
        $(this).text('[+] Share & Bookmark');
        return false;
    }
});

// NIVO SLIDER
$('#slider').nivoSlider({
    effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
    slices: 1, // For slice animations
    boxCols: 8, // For box animations
    boxRows: 4, // For box animations
    animSpeed: 300, // Slide transition speed
    pauseTime: 3000, // How long each slide will show
    startSlide: 0, // Set starting Slide (0 index)
    directionNav: true, // Next & Prev navigation
    controlNav: true, // 1,2,3... navigation
    controlNavThumbs: false, // Use thumbnails for Control Nav
    pauseOnHover: true, // Stop animation while hovering
    manualAdvance: false, // Force manual transitions
    prevText: 'Prev', // Prev directionNav text
    nextText: 'Next', // Next directionNav text
    randomStart: false, // Start on a random slide
    beforeChange: function(){}, // Triggers before a slide transition
    afterChange: function(){}, // Triggers after a slide transition
    slideshowEnd: function(){}, // Triggers after all slides have been shown
    lastSlide: function(){}, // Triggers when last slide is shown
    afterLoad: function(){} // Triggers when slider has loaded
});

});
