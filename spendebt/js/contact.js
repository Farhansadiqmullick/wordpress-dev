;(function($){
$(document).ready(function(){
    $("#send-message").on('click', function(){

        $.post(spendebturl.ajaxurl,{
            action:'contact',
            cn:$('#contact').val(),
            fname:$('#fname').val(),
            lname:$('#lname').val(),
            email:$('#email').val(),
            subject:$('#subject').val(),
            message:$('#message').val(),
        },function(data){
            console.log(data);
        }); return false;
    })
});
})(jQuery);