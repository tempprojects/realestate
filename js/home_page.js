jQuery(document).ready(function($){
    $('.modal').hide();
    $('.log_in').click(function(){
        $('.modal').show();
        $('body').css('overflow', 'hidden');
    });
    //HIDE CLICK BODY
    $(document).mouseup(function (e)  {
        var folder = $(".modal");

        if (!folder.is(e.target) && folder.has(e.target).length === 0) {
            folder.hide();
            $('body').css('overflow', 'auto');
            
        }
    });
    $('button').click(function(){
        $('.modal').hide();
        $('body').css('overflow', 'auto');
    })
    
});