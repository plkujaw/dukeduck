class Effects {
  constructor() {
    this.fadeInElements = [...document.querySelectorAll('.js-rise-fade-in')];
    this.drawInElementsOnScroll = [
      ...document.querySelectorAll('.js-animate-draw-scroll'),
    ];
    this.drawInElements = [...document.querySelectorAll('.js-animate-draw')];
    this.defaultObserver = {
      root: null,
      rootMargin: '-10% 0px -10% 0px',
      threshold: 0,
    };

    this.observerDrawInScroll = {
      root: null,
      rootMargin: '-40% 0px -40% 0px',
      threshold: 0,
    };

    this.fadeObserver = new IntersectionObserver(
      this.standardFade,
      this.defaultObserver
    );

    this.observerDrawIn = new IntersectionObserver(
      this.drawIn,
      this.observerDrawIn
    );

    this.observerDrawInScroll = new IntersectionObserver(
      this.drawIn,
      this.observerDrawInScroll
    );

    this.events();
  }

  events() {
    this.fadeInElements.forEach((el) => this.fadeObserver.observe(el));
    this.drawInElementsOnScroll.forEach((el) =>
      this.observerDrawInScroll.observe(el)
    );
    this.drawInElements.forEach((el) => this.observerDrawIn.observe(el));
  }

  standardFade(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }

  drawIn(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('graphic-animated');
      }
    });
  }
}

export default Effects;
