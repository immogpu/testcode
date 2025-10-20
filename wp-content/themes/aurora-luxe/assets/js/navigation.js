(function ($) {
    $(function () {
        var $toggle = $('.menu-toggle');
        var $nav = $('.primary-navigation');

        $toggle.on('click', function () {
            var expanded = $toggle.attr('aria-expanded') === 'true';
            $toggle.attr('aria-expanded', !expanded);
            $nav.toggleClass('is-open');
        });
    });
})(jQuery);
