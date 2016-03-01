(function($) {

    $.fn.extend({
        ssSelectbox: function (opts) {
            return $(this).each(function () {
             var config = $.extend(opts || {}, $(this).data(), $(this).data('selectboxconfig'), {});
             if ($(this).hasClass('selectbox-applied')) return; // already applied
             $(this).addClass('selectbox-applied').selectbox(config);
             $(this).blur().focus(); // trigger show
             });
        }
    });

    $(window).on('load', function () {
        $('.selectboxfield').ssSelectbox();
    });

}(jQuery));