import './style.scss';
import {Swiper} from 'swiper';
import 'swiper/swiper.css'
import {Autoplay, Mousewheel} from 'swiper/modules';

export function image_and_text() {
  const block = document.querySelector('.image_and_text');
  if (!block) return;
  
  // Add two background layers for crossfade
  const bg1 = block.querySelector('.background.bg1');
  const bg2 = block.querySelector('.background.bg2');
  let toggle = false;
  
  const swiper = new Swiper('.projects-text-swiper', {
    direction: 'vertical',
    slidesPerView: 'auto',
    spaceBetween: 50,
    mousewheel: true,
    centeredSlides: true,
    // loop:true,
    modules: [Autoplay, Mousewheel],
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    on: {
      init: function() {
        const firstSlide = this.slides[this.activeIndex];
        const bgUrl = firstSlide.getAttribute('data-bg');
        if (bgUrl) {
          bg1.style.backgroundImage = `url('${bgUrl}')`;
          bg1.style.opacity = 1; // <--- force visible
          bg2.style.opacity = 0;
        }
      },
      
      slideChangeTransitionStart: function() {
        const currentSlide = this.slides[this.activeIndex];
        const bgUrl = currentSlide.getAttribute('data-bg');
        
        if (bgUrl) {
          if (toggle) {
            bg2.style.backgroundImage = `url('${bgUrl}')`;
            bg2.style.opacity = 1;
            bg1.style.opacity = 0;
          } else {
            bg1.style.backgroundImage = `url('${bgUrl}')`;
            bg1.style.opacity = 1;
            bg2.style.opacity = 0;
          }
          toggle = !toggle;
        }
      },
    },
  });
}
