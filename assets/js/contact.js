;(function($){
    $(document).ready(function(){
        $("#send-message").on('click',function(){

            $.post(mealurl.ajaxurl,{
                action:'contact',
                cn:$('#contact').val(),
                name:$('#name').val(),
                email:$('#email').val(),
                subject:$('#subject').val(),
                message:$('#cmessage').val(),
            },function(data){
                console.log(data);
            });

            return false;
        })
    });
})(jQuery);