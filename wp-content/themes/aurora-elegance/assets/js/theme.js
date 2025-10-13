(function () {
  const menuToggle = document.querySelector('.menu-toggle');
  const primaryMenu = document.querySelector('.primary-menu');

  if (!menuToggle || !primaryMenu) {
    return;
  }

  menuToggle.addEventListener('click', () => {
    const isOpen = primaryMenu.classList.toggle('is-open');
    menuToggle.setAttribute('aria-expanded', String(isOpen));
  });
})();
