import Swiper from 'swiper/bundle'
import "swiper/css/bundle"

export default function (sliderContainer = '.swiper-slider') {

    window.setTimeout(function () {

        const slider = new Swiper(sliderContainer, {
            loop: true,
            autoplay: 3000,

            pagination: {
                el: '.swiper-pagination',
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })
    });

}
