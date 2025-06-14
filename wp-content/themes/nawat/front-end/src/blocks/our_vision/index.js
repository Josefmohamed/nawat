import './style.scss';
import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
export function our_vision() {
  const block = document.querySelector('.our_vision');
  if (!block) return;
  new Swiper(block.querySelector('.swiper'), {
    modules: [Navigation],
    slidesPerView: 3,
    spaceBetween: 50,
    centeredSlides: true,
    initialSlide:1,
    navigation: {
      nextEl: block.querySelector('.swiper-button-next'),
      prevEl: block.querySelector('.swiper-button-prev')
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      600: { slidesPerView: 2 },
      992: { slidesPerView: 3 }
    }
  });
}
