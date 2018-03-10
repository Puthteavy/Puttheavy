var clickEvent = ('ontouchstart' in window)? 'touchstart' : 'click';
(function ($) {
    var $w = $(window),
        $d = $(document),
        $b = $('body'),
        $p = $('#page');

    var innerSt;

    $('#humb-btn').on('click',function (e) {
        e.preventDefault();
        $b.toggleClass('menu-opened');
    });



    $d.find('a,button').on({
        'touchstart' :function(e){
            $(this).addClass('touched')
        },
        'touchend'   :function(){
            $(this).removeClass('touched')    
        }
    });

})(jQuery);