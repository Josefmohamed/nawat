import './style.scss';
import { gsap } from 'gsap';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

gsap.registerPlugin(ScrollToPlugin);

export function footerBlock() {
  const footerSelector = document.querySelector('footer');
  if (!footerSelector) return;
  
  const goToTop = footerSelector.querySelector('.go-to-top');
  if (!goToTop) return;
  
  goToTop.addEventListener('click', (e) => {
    e.preventDefault();
    gsap.to(window, {
      duration: 1,
      scrollTo: { y: 0 },
      ease: 'power2.out',
    });
  });
}
