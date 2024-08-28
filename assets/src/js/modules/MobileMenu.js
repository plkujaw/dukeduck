class MobileMenu {
  constructor() {
    this.header = document.querySelector('.header');
    this.menuBtn = document.querySelector('.js-mobile-menu-trigger');
    this.mobileMenu = document.querySelector('.mobile-menu');
    this.events();
  }

  events() {
    this.menuBtn.addEventListener('click', () => this.toggleMenu());
    window.addEventListener('resize', () => {
      const width =
        window.innerWidth ||
        document.documentElement.clientWidth ||
        document.body.clientWidth;
      if (
        width > 834 &&
        this.mobileMenu.classList.contains('mobile-menu--open')
      ) {
        this.closeMenu();
      }
    });
  }

  toggleMenu() {
    this.menuBtn.classList.toggle('burger--open');
    this.header.classList.toggle('header--menu-open');
    this.mobileMenu.classList.toggle('mobile-menu--open');
    this.menuBtn.getAttribute('aria-expanded') === 'false'
      ? this.menuBtn.setAttribute('aria-expanded', 'true')
      : this.menuBtn.setAttribute('aria-expanded', 'false');
    document.body.classList.toggle('no-scroll');
  }

  closeMenu() {
    this.menuBtn.classList.remove('burger--open');
    this.header.classList.remove('header--menu-open');
    this.mobileMenu.classList.remove('mobile-menu--open');
    this.menuBtn.getAttribute('aria-expanded') === 'false'
      ? this.menuBtn.setAttribute('aria-expanded', 'true')
      : this.menuBtn.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('no-scroll');
  }
}

export default MobileMenu;
