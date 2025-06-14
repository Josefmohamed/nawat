import './style.scss';
import {gsap} from "gsap";

export function headerBlock() {
    const header = document.querySelector('header');
    if (!header) return;
    
    const headerSelector = document.querySelector('header');
    if (!headerSelector) return;
    
    
    const burgerMenu = headerSelector.querySelector('.burger-menu');
    const menuLinks = headerSelector.querySelector('.navbar');
    
    
    if (!burgerMenu) return;
    
    const burgerSpans = burgerMenu.querySelectorAll('span');
    const burgerTl = gsap.timeline({paused: true});
    gsap.set(burgerSpans, {transformOrigin: 'center center'}); // Updated alignment
    burgerTl
        .to(burgerSpans[0], {y: 6, rotation: 45, duration: 0.25}, 0) // Adjusted y value
        .to(burgerSpans[1], {autoAlpha: 0, duration: 0.25}, 0)
        .to(burgerSpans[2], {y: -6, rotation: -45, duration: 0.25}, 0); // Adjusted y value
    
    burgerMenu.addEventListener('click', function () {
        if (burgerMenu.classList.contains('burger-menu-active')) {
            burgerMenu.classList.remove('burger-menu-active');
            menuLinks.classList.remove('header-links-active');
            headerSelector.classList.remove('header-active');
            burgerTl.reverse();
            document.documentElement.classList.remove('stop-scroll');
    
        } else {
            burgerMenu.classList.add('burger-menu-active');
            menuLinks.classList.add('header-links-active');
            headerSelector.classList.add('header-active');
            burgerTl.play();
            document.documentElement.classList.add('stop-scroll');
    
            gsap.fromTo(menuLinks.querySelectorAll('.menu-item , .enquires , .bottom-links'), {
                y: 30,
                autoAlpha: 0,
            }, {
                y: 0,
                autoAlpha: 1,
                stagger: .05,
                duration: .4,
                delay: .5,
            });
        }
    });

}

