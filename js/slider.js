document.addEventListener("DOMContentLoaded", function () {
  const mainCarousel = new Swiper(".main-carousel", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 800,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  const catCarousel = new Swiper(".cat-carousel", {
    loop: true,
    slidesPerView: 1.25,
    spaceBetween: 10,
    speed: 800,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 1.5,
      },
      1024: {
        slidesPerView: 2.5,
      },
    },
  });
});
