jQuery(document).ready(function($){
    $( ".save_period_booking" ).each(function(save_form) {
        var this_save_form = this;
        $(this).submit(function( event ){
            event.preventDefault();
            //$("#message").hide();
            var request = jQuery.ajax({
                url: sendform.ajax_url,
                method: "POST",
                data: $(this_save_form).serialize() + "&action=save_period_booking",
                dataType: "json"
            });

            request.done(function(argument) {
                console.log(argument);
                if(argument.success==true){

                }
            });
        });
    });
});
