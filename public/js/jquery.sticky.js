(function ($) {
    $.fn.sticky = function (options) {
        var settings = $.extend({
            topSpacing: 0,
            className: "is-sticky"
        }, options);

        var $window = $(window);
        var $this = this;
        var originalOffsetTop = $this.offset().top;

        function onScroll() {
            var scrollTop = $window.scrollTop();

            if (scrollTop > originalOffsetTop - settings.topSpacing) {
                if (!$this.hasClass(settings.className)) {
                    $this.addClass(settings.className);
                    $this.css({
                        position: "fixed",
                        top: settings.topSpacing,
                        width: "100%",
                        zIndex: 999
                    });
                }
            } else {
                if ($this.hasClass(settings.className)) {
                    $this.removeClass(settings.className);
                    $this.css({
                        position: "",
                        top: "",
                        width: "",
                        zIndex: ""
                    });
                }
            }
        }

        $window.on("scroll", onScroll);
        return this;
    };
})(jQuery);

// Aktifkan sticky pada header
$(document).ready(function () {
    $(".sticky-header").sticky({
        topSpacing: 0
    });
});
