;(function($){
    $(document).ready(function(){
        $("#loadmore").on('click', function(){

            var current_offset = $(".my-posts").data('count');
            var sid = $(".my-posts").data('sid');
            var ni = $(".my-posts").data('ni');

            var nonce = $("#loadmorep").val();
            $.post(portfoliourl.ajaxurl,{
                action:'loadmorep',
                nonce:nonce,
                offset:current_offset,
                sid:sid,
                ni:ni

            }, function(data){
                $(".my-posts").data('count', (parseInt(current_offset)+parseInt(ni)));
                console.log(data);

            });



            return false;
        });
    });
})(jQuery);