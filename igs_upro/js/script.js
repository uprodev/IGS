jQuery(document).ready(function ($) {

  //slider
  var swiperImgText = new Swiper(".img-text-slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    //loop: true,

    navigation: {
      nextEl: ".next-img",
      prevEl: ".prev-img",
    },
  });

  //change slider
  $(document).on('click', '.pagination-img a', function (e){
    e.preventDefault();
    let item = $(this).closest('li').index();
    $('.pagination-img li').removeClass('is-active');
    $(this).closest('li').addClass('is-active');
    swiperImgText.slideTo(item);
  });


  $(document).on('click', '.banner-filter .filter .input-wrap-check:first-child input', function (e){
    $('.banner-filter .filter .input-wrap-check input').prop('checked', false);
    $(this).prop('checked', true);
  });


  $(document).on('click', '.banner-filter .filter .input-wrap-check:nth-child(n + 2) input', function (e){
    $('.banner-filter .filter .input-wrap-check:first-child input').prop('checked', false);
   
  });


  //change slider
  swiperImgText.on('slideChange', function () {
    setTimeout(function() {
      let item = swiperImgText.activeIndex + 1;

      $('.pagination-img li').removeClass('is-active');
      $(".pagination-img li:nth-child(" + item + ")").closest('li').addClass('is-active');
    }, 400);
  });


  //slider
  var swiperNews = new Swiper(".news-slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    //loop: true,
    pagination: {
      el: ".news-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".news-next",
      prevEl: ".news-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: "auto",
        spaceBetween: 17,
      },

    },
  });


  //slider
  var swiperItem = new Swiper(".slider-item", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".next-item",
      prevEl: ".prev-item",
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 16,
      }
    },
    pagination: {
      el: ".pagination-item",
      clickable: true,

    },
  });

  if(window.innerWidth > 991){
    //fix header
    $(".top-line").sticky({
      topSpacing:0
    });
  }


  //hide fix block
  $(document).on('click', '.close-fix', function (e) {
    e.preventDefault();
    $('.fix-block').slideUp();

    document.cookie = "is_popup_closed=true; path=/";
  });

  //slider
  var swiperHomeBottom = new Swiper(".home-bottom-slider", {
    slidesPerView:1,
    spaceBetween: 10,
    pagination: {
      el: ".home-bottom-pagination",
      clickable: true,
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },

    },
  });


  //slider
  var swiperStepForm = new Swiper(".step-slider-form", {
    autoHeight: true,
    spaceBetween: 20,
    pagination: {
      el: ".form-pagination",
      type: "progressbar",
    },
    speed:700,
    allowTouchMove:false,
    touchRatio: 1,
    noSwiping: false,
    preventClicks :true,
    a11y: false,
  });

  //validate form

  $.validator.addMethod('emailtld', function(val, elem){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(!filter.test(val)) {
      return false;
    } else {
      return true;
    }
  }, 'Please enter your email');

  $('.form-step').validate({
    rules: {
      nameStep:{
        minlength: 3,
        required: true,
      },
      lastNameStep:{
        minlength: 3,
        required: true,
      },


    },
    messages: {
      nameStep:{
        minlength: "Enter at least 3 characters"
      },
      lastNameStep:{
        minlength: "Enter at least 3 characters"
      },

    }
  });

  $('.form-step .input-wrap-val input').on('keyup blur', function () {

    if ($(this).valid()) {
      $(this).closest('.input-wrap').removeClass('input-wrap-val')
    } else {
      $(this).closest('.input-wrap').addClass('input-wrap-val')
    }

    let item = $(this).closest('.swiper-slide').find('.input-wrap-val').length,
      itemBTN = $(this).closest('.swiper-slide').find('.btn-wrap');

    if(item < 1){
      itemBTN.addClass('is-go-next')
    }else{
      itemBTN.removeClass('is-go-next')
    }

  });


  //next slide
  $(document).on('click', '.btn-next', function (e){
    e.preventDefault();
    swiperStepForm.slideNext();
  });

  //prev slide
  $(document).on('click', '.btn-prev', function (e){
    e.preventDefault();
    swiperStepForm.slidePrev();
  });

  //mob menu

  /*mob menu*/
  $(document).on('click', '.open-menu', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');

    if($(this).hasClass('is-active')){
      $.fancybox.open( $('#menu-responsive'), {
        touch:false,
        autoFocus:false,
      });
      setTimeout(function() {
        $('html').addClass('is-menu');
      }, 100);
    }else{
      $('html').removeClass('is-menu');
      $.fancybox.close();
    }
  });

  //sub-menu open/close - mob-menu
  $(document).on('click', '.mob-menu>li>a', function (e){
    e.preventDefault();
    let item = $(this).closest('li').find('.sub-menu');
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      item.slideDown();
    }else{
      item.slideUp();
    }
  });

  //slider
  var swiperImgSlider = new Swiper(".text-img-slider", {
    spaceBetween: 10,
    slidesPerView: 1,
    freeMode: true,
    watchSlidesProgress: true,
  });

  //slider
  var swiperImg = new Swiper(".img-slider", {
    navigation: {
      nextEl: ".next-i",
      prevEl: ".prev-i",
    },
    thumbs: {
      swiper: swiperImgSlider,
    },
  });



  var swiperBigImg = new Swiper(".img-big-slider", {
    slidesPerView: "auto",
    spaceBetween: 15,
    centeredSlides: true,
    loop:true,
    navigation: {
      nextEl: ".next-big",
      prevEl: ".prev-big",
    },
    pagination: {
      el: ".pagination-big",
      clickable: true,
    },
  });

  $('.select-block select').niceSelect();



  //slider
  var swiperImgFull = new Swiper(".img-full-slider", {
    loop:true,
    navigation: {
      nextEl: ".img-full-next",
      prevEl: ".img-full-prev",
    },
  });

  //TABS
  (function($){
    jQuery.fn.lightTabs = function(options){

      var createTabs = function(){
        tabs = this;
        i = 0;

        showPage = function(i){
          $(tabs).find(".tab-content").children("div").hide();
          $(tabs).find(".tab-content").children("div").eq(i).show();
          $(tabs).find(".tabs-menu").children("li").removeClass("is-active");
          $(tabs).find(".tabs-menu").children("li").eq(i).addClass("is-active");
        }

        showPage(0);

        $(tabs).find(".tabs-menu").children("li").each(function(index, element){
          $(element).attr("data-page", i);
          i++;
        });

        $(tabs).find(".tabs-menu").children("li").click(function(){
          showPage(parseInt($(this).attr("data-page")));
        });
      };
      return this.each(createTabs);
    };
  })(jQuery);
  $(".tabs").lightTabs();


  //accordion
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });

  if(window.innerWidth > 1199){
    if($('.news-slider .swiper-slide').length<4){
      $('.news .nav-wrap').addClass('is-hide');

    }
    if($('.slider-item .swiper-slide').length<4){
      $('.slider-3x .slider-wrap .btn').addClass('is-hide');

    }
  }
  
});

