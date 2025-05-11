const swiper = new Swiper(".swiper", {
  loop: true,
  centeredSlides: true,
  slidesPerView: 2,
  spaceBetween: 50,
  speed: 800,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
