import Swiper, { Pagination, Navigation } from 'swiper';
import 'swiper/css';

class Media {
  constructor() {
    this.swiper = new Swiper('.block-media__carousel-wrapper.swiper', {
      modules: [Pagination, Navigation],
      speed: 1000,
      loop: true,
      slidesPerView: 1,
      pagination: {
        el: '.swiper-pagination.block-media__pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.block-media-button-next',
        prevEl: '.block-media-button-prev',
      },
    });
  }
}

export default Media;
