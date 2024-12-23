/**
 * Swiper
 */

import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

const buttonNext     = document.querySelector('.swiper-button-next');
const buttonPrevious = document.querySelector('.swiper-button-prev');
const pagination     = document.querySelector('.swiper-pagination');

new Swiper('.swiper--hero', {
  modules: [Navigation, Pagination],
  slidesPerView: 1,
  navigation: {
    nextEl: buttonNext,
    prevEl: buttonPrevious,
  },
  pagination: {
    el: pagination,
    clickable: true,
    type: 'bullets',
  },
});
