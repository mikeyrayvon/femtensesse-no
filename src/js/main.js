/* jshint esversion: 6, browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global document */

// Import dependencies
import $ from 'jquery';
import Swiper from 'swiper';
import lazySizes from 'lazysizes';
import Mailchimp from './mailchimp';

// Import style
import '../styl/site.styl';

class Site {
  constructor() {
    this.mobileThreshold = 601;

    $(window).resize(this.onResize.bind(this));

    $(document).ready(this.onReady.bind(this));

  }

  onResize() {
  }

  onReady() {
    lazySizes.init();
    this.fixWidows();
    this.setupSwiper();
  }

  toggleScrollLock() {
    var $main = $('#main-container');
    if ($main.hasClass('scroll-locked')) {
      $main.removeClass('scroll-locked').css('top', 'unset');
      $(window).scrollTop(this.lockOffset);
    } else {
      this.lockOffset = $(window).scrollTop();
      $main.addClass('scroll-locked').css('top', -(this.lockOffset));
    }
  }

  setupSwiper() {
    var _this = this;
    var $swiperContainer = $('.swiper-container');
    var slidesLength = $swiperContainer.find('.swiper-slide').length;
    var swiperArgs = {
      simulateTouch: slidesLength > 1 ? true : false,
      slidesPerView: 1,
      initialSlide: 0,
      loop: true,
      speed: 0,
      navigation: {
        nextEl: '.slide-next',
        prevEl: '.slide-prev',
      },
      allowTouchMove: false,
      on: {
        slideChangeTransitionEnd: function () {
          $('.swiper-slide.zoomed').removeClass('zoomed');
          $('.slide-caption.show-info').removeClass('show-info');
        },
      },
    };

    var swiperInstance = new Swiper ('.swiper-container', swiperArgs);

    $('.toggle-overlay').on('click', function(event) {
      _this.toggleScrollLock();

      var $target = $(event.target);
      $('#overlay-gallery').toggleClass('active');
      $('.swiper-slide.zoomed').removeClass('zoomed');
      if ($target.hasClass('gallery-thumb')) {
        var id = $target.attr('data-id');
        var index = parseInt($('.swiper-slide[data-image-id="' + id + '"]').attr('data-swiper-slide-index'));
        swiperInstance.slideTo(index + 1);
      }
    });

    $('.toggle-zoom').on('click', function(event) {
      var $slide = $(event.target).parent('.swiper-slide');
      var $zoomImg = $slide.find('.slide-zoom-image');
      /*var zoomSrc = $(event.target).attr('data-zoom-src');

      console.log(zoomSrc);

      $zoomImg.attr('src', zoomSrc);*/

      $slide.toggleClass('zoomed');

      var windowHeight = $(window).height();
      var zoomHeight = $zoomImg.outerHeight();

      if (zoomHeight > windowHeight) {
        $slide.scrollTop((zoomHeight - windowHeight) / 2);
      } else {
        $zoomImg.css('margin-top', ((windowHeight - zoomHeight) / 2) + 'px');
      }
    });

    $('.slide-caption-info-trigger').on('click', function(event) {
      var $caption = $(event.target).parent('.slide-caption');
      $caption.addClass('show-info');
    });
  }

  fixWidows() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      var split = string.split('');
      split[string.lastIndexOf(' ')] = '&nbsp;';
      $(this).html(split.join(''));
    });
  }
}

new Site();
new Mailchimp();
