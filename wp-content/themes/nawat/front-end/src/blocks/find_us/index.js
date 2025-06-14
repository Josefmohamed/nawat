import './style.scss';
import {gsap} from "gsap";

export function find_us() {
    const block = document.querySelector('.find_us');
    if (!block) return;

    const line = block.querySelector(".line path")

    gsap.set(line, {
        drawSVG: "0%"
    })

    gsap.to(line, {
        scrollTrigger: {
            trigger: block,
            start: "top center",
        },
        drawSVG: "100%"
    })

}


