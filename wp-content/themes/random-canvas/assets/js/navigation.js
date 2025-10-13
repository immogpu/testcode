(function () {
    document.body.classList.add('js-enabled');

    const toggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('#primary-menu');
    const navigation = document.querySelector('#site-navigation');

    if (!toggle || !menu || !navigation) {
        return;
    }

    toggle.addEventListener('click', function () {
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', (!isExpanded).toString());
        menu.classList.toggle('is-open');
        navigation.classList.toggle('is-open');
    });
})();
