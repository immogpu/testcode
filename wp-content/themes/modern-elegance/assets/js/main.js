(function () {
  const animatedElements = document.querySelectorAll('[data-animate], .will-animate');
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReducedMotion) {
    animatedElements.forEach(element => {
      element.classList.remove('will-animate');
      element.classList.add('is-visible');
    });
    return;
  }

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.15
    }
  );

  animatedElements.forEach(element => {
    element.classList.add('will-animate');
    observer.observe(element);
  });
})();
