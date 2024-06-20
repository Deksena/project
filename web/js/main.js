//swiper
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  //scrollreveal animation
  const animate =ScrollReveal({
    origin:"top",
    distance:"60px",
    duration:"2500",
    delay:"400"
  });
  animate.reveal(".navbar");
  animate.reveal(".overlay-text",{origin:"left"});
  animate.reveal(".image-container",{origin:"left"});
  animate.reveal(".ser-box, .product-box,.team-box,.book-data",{interval:100});
  