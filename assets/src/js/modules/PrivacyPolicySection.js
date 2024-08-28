class PrivacyPolicySection {
  constructor(section) {
    this.section = section;
    this.sections = document.querySelectorAll('.content-section');
    this.sectionTitle = section.querySelector('.js-section-title');
    this.sectionCopy = section.querySelector('.js-section-copy');
    this.first = [...this.sections].filter((section, index) => index === 0)[0];
    this.windowWidth =
      window.innerWidth ||
      document.documentElement.clientWidth ||
      document.body.clientWidth;
    this.events();
  }

  events() {
    this.showFirst();
    this.sectionTitle.addEventListener('click', () => {
      if (this.windowWidth <= 599) {
        this.toggleSlide();
      } else {
        this.toggleShow();
      }
    });
  }

  showFirst() {
    this.first.querySelector('.js-section-title').classList.add('active');
    this.first.querySelector('.js-section-copy').style.maxHeight =
      this.first.querySelector('.js-section-copy').scrollHeight + 'px';
  }

  toggleShow() {
    const titles = [...document.querySelectorAll('.js-section-title')];
    const articles = [...document.querySelectorAll('.js-section-copy-desktop')];
    const copyWrapper = document.querySelector(
      '.section-copy-wrapper.hidden-mobile'
    );

    const title = this.sectionTitle;
    const article = articles.filter(
      (article) => article.dataset.id == title.dataset.id
    )[0];

    copyWrapper.style.height = article.clientHeight + 'px';

    titles.forEach((title) => {
      title.classList.remove('active');
    });

    articles.forEach((article) => {
      if (title.dataset.id == article.dataset.id) {
        article.style.opacity = 1;
        article.style.pointerEvents = 'all';
        title.classList.add('active');
      } else {
        article.style.opacity = 0;
        article.style.pointerEvents = 'none';
      }
    });
    window.addEventListener('resize', () => {
      copyWrapper.style.height = article.clientHeight + 'px';
    });
  }

  toggleSlide() {
    this.sectionTitle.classList.toggle('active');
    if (this.sectionCopy.style.maxHeight) {
      this.sectionCopy.style.maxHeight = null;
    } else {
      this.sectionCopy.style.maxHeight = this.sectionCopy.scrollHeight + 'px';
    }
  }
}

export default PrivacyPolicySection;
