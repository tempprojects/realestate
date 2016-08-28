jQuery(document).ready(function($){
    var flag_modal=false,
    current_permalink=""; 
    curren_user=""


    $(".mail_modal").click(function(argument) {
        if(!$(".modal").is(":visible")){
            $(".modal").show();
            current_permalink= $(this).data('permalink');
            curren_user=$(this).data('urer');
            console.log(current_permalink);
            console.log(curren_user);
        }
    })
    
    //HIDE CLICK BODY
    $(document).click(function (e)  {
        var folder = $(".modal");
        if(folder.is(":visible")){
            if(flag_modal){
                e.preventDefault();
                if (!folder.is(e.target) && folder.has(e.target).length === 0) {
                    folder.hide();
                    $("#message2").hide();
                    $('body').css('overflow', 'auto');
                }
            }
            flag_modal=!flag_modal;
        }
    });



    $( ".modal form" ).submit(function( event ){
        event.preventDefault();
        $("#message2").hide();
        var request = jQuery.ajax({
            url: sendform.ajax_url,
            method: "POST",
            data: $( ".modal form" ).serialize() + "&action=single_sendform" + "&permalik=" + current_permalink + "&user_id=" + curren_user,
            dataType: "html"
        });
        request.done(function(argument) {
            console.log(argument);
            if(!argument){
                $("#message2").html("<h4>Your message has been sent! Thank you! </h4>");
                $("#message2").css("color", "green"); 
                $("#message2").show();
                $( ".modal form input[type='submit']").attr('disabled', true);
            }
            else{
                $("#message2").html("<h4>Failed to send your message. Please try later!</h4>");
                $("#message2").css("color", "red"); 
                $("#message2").show();
            }
        });
    });
});