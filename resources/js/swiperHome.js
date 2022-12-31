import Swiper, { Pagination } from 'swiper';
Swiper.use([Pagination]);

window.addEventListener('DOMContentLoaded', ()=>{
  let swiperHomeExists = document.querySelector('#swiperHome');
  if(swiperHomeExists){

    var swiper = new Swiper('.swiper', {

      slidesPerView:2,
      loop: true,
      autoplay: {
        delay: 6000,
      },
      direction: 'horizontal',
    
      hashNavigation: {
          watchState: true,
      },
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      

      breakpoints:{

        320: {
          slidesPerView: 1,
          spaceBetween: 20
        },

        480: {
          slidesPerView: 2,
          spaceBetween: 30
        },

        640: {
          slidesPerView: 3,
          spaceBetween: 30
        },

      }
    });
    

  }

})


