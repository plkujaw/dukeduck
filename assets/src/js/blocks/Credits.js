class Credits {
  constructor() {
    this.readMoreElements = document.querySelectorAll(
      '.block-credits__inner p:nth-child(n + 7)'
    );
    this.showMoreBtn = document.querySelector('.js-credits-show-more');
    if (this.readMoreElements.length) {
      this.events();
    }
  }

  events() {
    let wrapper = document.createElement('div');
    wrapper.classList.add(
      'block-credits__inner',
      'block-credits__inner--overflow'
    );
    this.wrapAll(this.readMoreElements, wrapper);
    this.showMoreBtn.addEventListener('click', () => this.toggleShowMore());
  }

  wrapAll(nodes, wrapper) {
    const parent = nodes[0].parentNode;
    const previousSibling = nodes[0].previousSibling;
    for (let i = 0; nodes.length - i; wrapper.firstChild === nodes[0] && i++) {
      wrapper.appendChild(nodes[i]);
    }
    const nextSibling = previousSibling
      ? previousSibling.nextSibling
      : parent.firstChild;
    parent.insertBefore(wrapper, nextSibling);
    return wrapper;
  }

  toggleShowMore() {
    const moreWrapper = document.querySelector(
      '.block-credits__inner.block-credits__inner--overflow'
    );

    if (!moreWrapper.classList.contains('active')) {
      moreWrapper.classList.add('active');
      moreWrapper.style.height = 'auto';
      let height = `${moreWrapper.clientHeight}px`;
      moreWrapper.style.height = '0px';
      this.showMoreBtn.innerHTML = `HIDE<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19 9.03843H9.95697V0H9.03843V9.03843H0V9.95697H9.03843V19H9.95697V9.95697H19V9.03843Z" fill="#01928E"/></svg>`;
      this.showMoreBtn.classList.add('active');
      setTimeout(() => {
        moreWrapper.style.height = height;
      }, 0);
    } else {
      moreWrapper.style.height = '0px';
      this.showMoreBtn.innerHTML = `SEE ALL CREDITS<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19 9.03843H9.95697V0H9.03843V9.03843H0V9.95697H9.03843V19H9.95697V9.95697H19V9.03843Z" fill="#01928E"/></svg>`;
      this.showMoreBtn.classList.remove('active');

      moreWrapper.addEventListener(
        'transitionend',
        () => {
          moreWrapper.classList.remove('active');
          moreWrapper.removeAttribute('style');
        },
        { once: true }
      );
    }
  }
}

export default Credits;
