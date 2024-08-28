class Journal {
  constructor() {
    this.journalCategoriesList = document.querySelector('.journal__categories');
    this.journalCategoriesListLinks = [
      ...this.journalCategoriesList.querySelectorAll('.category-link'),
    ];

    this.filtersBtn =
      this.journalCategoriesList.querySelector('.js-filters-btn');
    this.windowHref = window.location.href.toString();
    this.visuals = document.querySelectorAll('.category-visuals');
    this.visualPopup = document.querySelector('.visual-popup');
    this.visualWrapper = this.visualPopup.querySelector('.visual-popup__media');
    this.visualPopupClose = this.visualPopup.querySelector(
      '.js-visual-popup-close'
    );
    this.events();
  }

  events() {
    this.filtersBtn.addEventListener('click', () => this.toggleFilters());
    this.markCurrentCategory();

    this.visuals.forEach((visual) => {
      visual.querySelector('a').addEventListener('click', (e) => {
        e.preventDefault();
        this.displayVisual(visual);
      });
    });

    this.visualPopupClose.addEventListener('click', () => {
      this.visualPopup.classList.remove('visual-popup--open');
      document.body.classList.remove('no-scroll');
      this.visualWrapper.innerHTML = '';
    });
  }

  toggleFilters() {
    this.journalCategoriesList.classList.toggle('open');
  }

  markCurrentCategory() {
    this.journalCategoriesListLinks.forEach((link) => {
      const linkHref = link.href.toString();
      if (this.windowHref.includes(linkHref)) {
        link.classList.add('link-active');
      }
    });

    const currentCategory = this.journalCategoriesListLinks.filter((link) =>
      link.classList.contains('link-active')
    )[0];

    this.filtersBtn.innerHTML = `${currentCategory.innerText}<svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 12.0568L14.1173 11.113L8.14582 16.6339L8.14582 -2.99606e-07L6.84768 -3.56349e-07L6.84768 16.6339L0.882734 11.113L-5.2702e-07 12.0568L7.49675 19L15 12.0568Z" fill="#071134" />`;

    if (currentCategory.innerText === 'All') {
      this.filtersBtn.innerHTML = `FILTERS<svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 12.0568L14.1173 11.113L8.14582 16.6339L8.14582 -2.99606e-07L6.84768 -3.56349e-07L6.84768 16.6339L0.882734 11.113L-5.2702e-07 12.0568L7.49675 19L15 12.0568Z" fill="#071134" />`;
    }
  }

  openVisualPopup() {
    this.visualPopup.classList.add('visual-popup--open');
    document.body.classList.add('no-scroll');
  }

  displayVisual(visual) {
    [...visual.children].forEach((child) => {
      if (child.classList.contains('block-journal-post__media')) {
        const wrappers = child.querySelector('a').children[0].children;
        if (wrappers.length == 1 && wrappers[0].nodeName == 'IMG') {
          this.openVisualPopup();
          let img = wrappers[0];
          this.visualWrapper.innerHTML = `<img src="${img.dataset.fullSize}"/>`;
        } else if (wrappers.length == 2 && wrappers[0].nodeName != 'IFRAME') {
          this.openVisualPopup();
          const iframe = wrappers[1];
          const iframeSrc = iframe.src;
          const src = iframeSrc.slice(0, iframeSrc.indexOf('&'));
          this.visualWrapper.innerHTML = `<div class="embed-container vimeo-player-custom-controls">
          <iframe src="${src}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                </div>`;
        }
      }
    });
  }
}

export default Journal;
