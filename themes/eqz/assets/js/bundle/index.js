import clickOutside from "./modules/clickOutside";
import scrollTop from "./modules/scrollTop";
import slider from "./modules/slider";
import toggleClass from "./modules/toggleClass";
import mobileMenu from "./modules/mobileMenu";
import readmore from "./modules/readmore";

slider('.mySwiper')
toggleClass();
mobileMenu('.js-toggle-menu', '#menu-mobile', 'hidden');
readmore();
scrollTop();
clickOutside('is-active')

