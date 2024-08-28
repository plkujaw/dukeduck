import Swiper, { Pagination, Autoplay } from 'swiper';
import Vimeo from '@vimeo/player';
import 'swiper/css';

class Hero {
  constructor() {
    this.ctrlBtn = document.querySelectorAll('.js-video-ctrl');
    this.videos = [...document.querySelectorAll('.hero__video iframe')];

    // this.iframe = wrapper.querySelector('iframe');
    // this.player = new Vimeo(this.iframe);

    this.swiper = new Swiper('.swiper.hero__slider', {
      modules: [Pagination, Autoplay],
      speed: 700,
      loop: true,
      slidesPerView: 1,
      noSwiping: true,
      noSwipingSelector: 'div',
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination.hero__pagination',
        clickable: true,
      },
      on: {
        // beforeSlideChangeStart: function () {
        //   const index_currentSlide = this.activeIndex;
        //   const currentSlide = this.slides[index_currentSlide];
        //   const currentSlideVideo = currentSlide.querySelector(
        //     '.hero__video iframe'
        //   );
        //   if (currentSlideVideo) {
        //     const video = new Vimeo(currentSlideVideo);
        //     const ctrlBtn = currentSlide.querySelector('.js-video-ctrl');
        //     video.pause();
        //     ctrlBtn.classList.remove('video-ctrl--playing');
        //   }
        // },

        slideChangeTransitionStart: function () {
          const index_currentSlide = this.activeIndex;
          const currentSlide = this.slides[index_currentSlide];
          const currentSlideTitle = currentSlide.querySelector('h2');
          currentSlideTitle.classList.add('animate');
        },
        slideChangeTransitionEnd: function () {
          const index_currentSlide = this.activeIndex;
          const currentSlide = this.slides[index_currentSlide];
          const currentSlideTitle = currentSlide.querySelector('h2');
          currentSlideTitle.classList.remove('animate');
        },
      },
    });
    this.events();
  }

  events() {
    // this.ctrlBtn.forEach((btn) => {
    //   btn.addEventListener('click', () => {
    //     setTimeout(() => {
    //       if (btn.classList.contains('video-ctrl--playing')) {
    //         this.swiper.autoplay.stop();
    //       } else {
    //         this.swiper.autoplay.start();
    //       }
    //     }, 200);
    //   });
    // });
  }
}

export default Hero;
