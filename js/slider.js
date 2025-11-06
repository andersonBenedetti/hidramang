document.addEventListener("DOMContentLoaded", function () {
  const mainCarousel = new Swiper(".main-carousel", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 800,
  });

  const catCarousel = new Swiper(".carousel-infos", {
    loop: true,
    slidesPerView: 1.25,
    spaceBetween: 20,
    speed: 800,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".carousel-infos .swiper-button-next",
      prevEl: ".carousel-infos .swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2.8,
      },
      1024: {
        slidesPerView: 3.8,
      },
    },
  });
});
