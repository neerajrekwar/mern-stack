<?php
// index.php — Owl Carousel autoplay demo (PHP)
$slides = [
  ["img" => "images/slide1.jpg", "title" => "First Slide",  "caption" => "Your catchy caption"],
  ["img" => "images/slide2.jpg", "title" => "Second Slide", "caption" => "Another caption"],
  ["img" => "images/slide3.jpg", "title" => "Third Slide",  "caption" => "Last caption"],
];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Owl Carousel Autoplay (PHP)</title>

  <!-- OwlCarousel2 CSS (CDN) -->
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

  <style>
    body { margin:0; font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,"Helvetica Neue",Arial; }
    .hero .item {
      position: relative;
      height: 60vh;               /* adjust for your design */
      min-height: 360px;
      display: grid;
      place-items: center;
      overflow: hidden;
    }
    .hero .item img {
      width: 100%;
      height: 100%;
      object-fit: cover;          /* ensures full bleed background image */
      display: block;
    }
    .slide-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(0,0,0,.2), rgba(0,0,0,.55));
    }
    .slide-text {
      position: absolute;
      bottom: 8%;
      left: 5%;
      color: #fff;
      max-width: 640px;
    }
    .slide-text h2 { margin: 0 0 .25rem; font-size: clamp(1.25rem, 3vw, 2rem); }
    .slide-text p { margin: 0; opacity: .9; }
    /* Optional: hide nav dots on small screens */
    @media (max-width: 640px) {
      .owl-dots { display: none; }
    }
  </style>
</head>
<body>

  <!-- Carousel -->
  <div class="owl-carousel hero">
    <?php foreach ($slides as $s): ?>
      <div class="item" aria-label="<?= htmlspecialchars($s['title']) ?>">
        <img src="<?= htmlspecialchars($s['img']) ?>" alt="<?= htmlspecialchars($s['title']) ?>">
        <div class="slide-overlay" aria-hidden="true"></div>
        <div class="slide-text">
          <h2><?= htmlspecialchars($s['title']) ?></h2>
          <p><?= htmlspecialchars($s['caption']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- jQuery (required) and OwlCarousel2 JS (CDN) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script>
    $(function () {
      $('.owl-carousel').owlCarousel({
        items: 1,               // 1 slide at a time (hero)
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 3500,  // 3.5s per slide
        autoplayHoverPause: true,
        autoplaySpeed: 600,     // slide animation speed
        smartSpeed: 650,        // nav/dots speed
        dots: true,
        nav: true,
        navText: ['‹','›'],     // simple arrows; replace with icons if you like
        responsive: {
          768: { items: 1 },
          1024: { items: 1 }
        }
      });

      // Optional: start/stop from JS if needed
      // const $owl = $('.owl-carousel');
      // $owl.trigger('play.owl.autoplay', [3500]);   // start
      // $owl.trigger('stop.owl.autoplay');           // stop
    });
  </script>
</body>
</html>
