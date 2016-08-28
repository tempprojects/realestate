
jQuery(document).ready(function($){
    $( "#login_form" ).submit(function( event ){
        event.preventDefault();
        $("#message").hide();

        var request = jQuery.ajax({
            url: sendform.ajax_url,
            method: "POST",
            data: $("#login_form").serialize() + "&action=login_form",
            dataType: "json"
        });

        request.done(function(argument) {
            console.log(argument);
            if(argument.loggedin==true){
                document.location.href = argument.redirect;
            }
            else{
                $("#message").html(argument.message);
                $("#message").css("color", "red"); 
                $("#message").show();
            }
        });
    });
});