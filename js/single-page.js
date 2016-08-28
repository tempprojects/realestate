/*
 * Adapted from: http://mikejolley.com/2012/12/using-the-new-wordpress-3-5-media-uploader-in-plugins/
 */
jQuery(document).ready(function($){
    $( "#send_form" ).submit(function( event ){
        event.preventDefault();

        var request = jQuery.ajax({
            url: sendform.ajax_url,
            method: "POST",
            data: $("#send_form").serialize() + "&action=single_sendform",
            dataType: "html"
        });
        request.done(function(argument) {
            console.log(argument);
            if(!argument){
                $("#message").html("<h4>Your message has been sent! Thank you! </h4>");
                $("#message").css("color", "green"); 
                $("#send_form input[type='submit']").attr('disabled', true);
            }
            else{
                $("#message").html("<h4>Failed to send your message. Please try later!</h4>");
                $("#message").css("color", "red"); 
            }
        });
    });
});