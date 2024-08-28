import Swiper, { Scrollbar, Navigation, FreeMode, Mousewheel } from 'swiper';
import 'swiper/css';
import 'swiper/css/free-mode';

class ContentSlider {
  constructor() {
    const swiper = new Swiper('.swiper.content-slider', {
      modules: [Scrollbar, Navigation, FreeMode, Mousewheel],
      loop: false,
      slidesPerView: 1.5,
      spaceBetween: 20,
      freeMode: true,
      mousewheel: {
        thresholdDelta: 1,
      },
      effect: 'slide',
      navigation: {
        nextEl: '.content-slider-button-next',
        prevEl: '.content-slider-button-prev',
      },
      scrollbar: {
        el: '.content-slider-scrollbar',
        draggable: true,
      },
      breakpoints: {
        599: {
          slidesPerView: 2.5,
          spaceBetween: 25,
        },
        1200: {
          slidesPerView: 3.5,
        },
      },
    });
  }
}

export default ContentSlider;
