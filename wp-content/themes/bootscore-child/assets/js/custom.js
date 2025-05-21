jQuery(function ($) {
  // Do stuff here

  // Hero Banner sincronización de imágenes y slides con fade
  var $heroBanner = $(".s-hero-banner");
  if ($heroBanner.length) {
    var $slides = $heroBanner.find(".hero-banner__slide");
    var $images = $heroBanner.find(".hero-banner__image");
    var $menuLinks = $heroBanner.find(".hero-banner__menu a");

    function setActiveHeroImage(index) {
      $images.removeClass("active");
      $images.eq(index).addClass("active");
      $menuLinks.removeClass("active");
      $menuLinks.eq(index).addClass("active");
    }

    // Detectar slide activo por scroll (cada slide ocupa 100vh, por ejemplo)
    function getCurrentSlideIndex() {
      var scrollTop = $(window).scrollTop();
      var windowHeight = $(window).height();
      var index = 0;
      $slides.each(function (i) {
        var slideTop = $(this).offset().top;
        var slideHeight = $(this).outerHeight();
        if (
          scrollTop + windowHeight / 2 >= slideTop &&
          scrollTop + windowHeight / 2 < slideTop + slideHeight
        ) {
          index = i;
          return false; // break
        }
      });
      return index;
    }

    // Inicializar
    setActiveHeroImage(0);

    // Al hacer scroll, actualizar imagen activa y anchor
    $(window).on("scroll", function () {
      var idx = getCurrentSlideIndex();
      setActiveHeroImage(idx);
    });

    // Navegación por anchor/menu con scroll suave y sincronización
    $menuLinks.on("click", function (e) {
      e.preventDefault();
      var target = $(this).attr("href");
      var $targetSlide = $(target);
      if ($targetSlide.length) {
        var idx = $slides.index($targetSlide);
        // Scroll suave
        $("html, body").animate(
          {
            scrollTop: $targetSlide.offset().top,
          },
          600,
          function () {
            setActiveHeroImage(idx);
          }
        );
      }
    });
  }

  // Animación de número en .block-number strong solo cuando es visible
  function animateNumber($el) {
    var $strong = $el.find("strong");
    if ($strong.data("animated")) return; // Evita animar dos veces
    var target = parseInt($strong.text().replace(/\D/g, ""), 10);
    $strong.data("animated", true);
    $strong.prop("Counter", 0).animate(
      { Counter: target },
      {
        duration: 1500,
        easing: "swing",
        step: function (now) {
          $strong.text(Math.ceil(now));
        },
      }
    );
  }

  function isElementInViewport(el) {
    var rect = el.get(0).getBoundingClientRect();
    return (
      rect.top < window.innerHeight &&
      rect.bottom > 0
    );
  }

  function checkBlockNumbers() {
    $(".block-number").each(function () {
      var $el = $(this);
      if (isElementInViewport($el)) {
        animateNumber($el);
      }
    });
  }

  // Lanzar al cargar y al hacer scroll
  $(window).on("scroll resize load", checkBlockNumbers);
  // Por si acaso, también al DOM ready
  checkBlockNumbers();
}); // jQuery End
