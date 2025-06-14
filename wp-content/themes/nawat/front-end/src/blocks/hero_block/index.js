import './style.scss';
export function hero_block() {
  const block = document.querySelector('.hero_block');
  if (!block) return;

    block.querySelector('.scroll-down').addEventListener('click', function () {
        window.scrollBy({
            top: window.innerHeight,
            left: 0,
            behavior: 'smooth'
        });
    });

}
