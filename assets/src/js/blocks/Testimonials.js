import Swiper, { Navigation } from 'swiper';
import 'swiper/css';

class Testimonials {
  constructor() {
    this.swiper = new Swiper('.block-testimonials .swiper', {
      modules: [Navigation],
      speed: 1000,
      loop: true,
      slidesPerView: 1,
      navigation: {
        nextEl: '.testimonials-next',
        prevEl: '.testimonials-prev',
      },
    });
  }
}

export default Testimonials;
