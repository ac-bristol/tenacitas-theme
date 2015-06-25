'use strict';

(function() {
  window.tenacitas = window.tenacitas || {};
}());

tenacitas.home = (function () {

  /**
   * Initialize home
   *
   * @function init
   * @memberof! tenacitas.home
   */
  function init() {

    if ($('.js-carousel').length) { 
      var carouselImg = $('.js-carousel-one').data('src'),
          carouselImg2 = $('.js-carousel-two').data('src'),
          carouselImg3 = $('.js-carousel-three').data('src'),
          imgArray = [carouselImg,carouselImg2,carouselImg3];
    }

    $(window).load(function(){ 
      var speed = 10000;
      var run = setInterval(function(){ 
        rotate();
        changeBackground(); 
      }, speed);  

      $('.js-next').click(function() {

        $('.js-carousel-item.active').removeClass('active').next('.js-carousel-item').addClass('active');

        if (!$('.js-carousel-item').hasClass('active')) {
          $('.js-carousel-item:first-of-type').addClass('active');
        }

        changeBackground();

        return false;
      });

      $('.js-previous').click(function() {

        $('.js-carousel-item.active').removeClass('active').prev('.js-carousel-item').addClass('active');

        if (!$('.js-carousel-item').hasClass('active')) {
          $('.js-carousel-item:last-of-type').addClass('active');
        }

        changeBackground();

        return false;
      });

      $('.hotspot').hover(
        function() {
          clearInterval(run);
        }, 
        function() {
          var speed = 10000;
          var run = setInterval(function(){ 
            rotate();
            changeBackground(); 
          }, speed);      
        }
      ); 
    });     
    // $('.js-carousel').css({'background-image':'url(' + carouselImg2 + ')'});
  }

  function rotate() {
    $('.js-next').click(); 
  }

  function changeBackground() {

    var latestUrl = $('.js-carousel-item.active').data('src');

      $('.js-carousel').css({'background-image':'url(' + latestUrl + ')'});

  }

  return {
    init: init 
  };

})();

tenacitas.menu = (function () {
	  /**
   * Initialize menu
   *
   * @function init
   * @memberof! tenacitas.menu
   */
  function init() {
  	$('.js-menu').on('click', function(e){
  		e.preventDefault();
  		$('body').toggleClass('nav--open');
		 	$('.nav__list').slideToggle();
  	});

    var toggles = document.querySelectorAll('.cmn-toggle-switch');

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        (this.classList.contains('active') === true) ? this.classList.remove('active') : this.classList.add('active');
      });
    }

  }

  return {
    init: init 
  };

})();

tenacitas.scroll = (function () {
	  /**
   * Initialize scroll
   *
   * @function init
   * @memberof! tenacitas.scroll
   */
  function init() {
		$('a.js-ease').click(function(){
		    $('html, body').animate({
		        scrollTop: $( $.attr(this, 'href') ).offset().top
		    }, 500);
		    return false;
		});
  }

  return {
    init: init 
  };

})();

tenacitas.news = (function () {

  /**
   * Initialize News section
   *
   * @function init
   * @memberof! tenacitas.news
   */
  function init() {

    $( document ).ready(function() {
      if ($('#js-news').length) { 

        hideNews();

        $(window).load(function(){ 
          initMasnry(); 
        });        

        $('.js-viewMore').on('click', function(e){
          e.preventDefault();
          viewMore();
          if (!$('.news__item').hasClass('hidden')) {
            $('.js-viewMore').hide();
          }
        });

        window.addEventListener('resize', function() {
          initMasnry();
        }, true);
      }
    });
  	
  }

  function hideNews() {
  	var windowWidth = $(window).width();

  	if(windowWidth >= 748) { 
	  	if ($('.news__item').length >= 8) {
	  		// $('.news__item').slice(0, 8).removeClass('hidden');
	  		$('.news__item').slice(8).addClass('hidden');

	  	}
	  } else {
	  	$('.news__item').slice(2).addClass('hidden');

	  	$('.news__item.hidden').slice(0,4).removeClass('hidden').addClass('visible');

	  	initMasnry();
	  }
  }

  function viewMore() {
  	var windowWidth = $(window).width();

		if(windowWidth >= 748) { 
	  	$('.news__item.hidden').slice(0,4).removeClass('hidden').addClass('visible');
	  	initMasnry();
		} else {
			$('.news__item.hidden').slice(0,1).removeClass('hidden').addClass('visible');
			initMasnry();
		}
  }

  function initMasnry() {
  	// var container = document.querySelector('#js-news');
		$('#js-news').isotope({
      layoutMode: 'masonry',
      itemSelector: '.news__item',
      sortBy : 'original-order'
    });
  }

  return {
    init: init 
  };

})();

tenacitas.team = (function () {

  /**
   * Initialize Team section
   *
   * @function init
   * @memberof! tenacitas.team
   */
  function init() { 

    if ($('.team').length) { 

      wrapElements();        

      $('.team__item').on('click', function(e){
        if ($('.team__item.active').length){
          $(this).removeClass('active');
          $(this).next().removeClass('active').fadeOut();
        } else {
          $(this).addClass('active');
          $(this).next().addClass('active').fadeIn();
        }
        removeActive();
      }); 
    }
  }

  function wrapElements(){
    var windowWidth = $(window).width();

    var divs = $('.team__wrap');
    for(var i = 0; i < divs.length; i+=4) {
      divs.slice(i, i+4).wrapAll("<div class='team__row--mobile'></div>");
    }

    var divs = $('.team__row--mobile');
    for(var i = 0; i < divs.length; i+=2) {
      divs.slice(i, i+2).wrapAll("<div class='team__row--desktop'></div>");
    }

  }

  function removeActive() {
    $('.team__content .js-close').on('click', function(e){
      e.preventDefault();
      if($(this).parent().hasClass('active')) { 
        $(this).parent().removeClass('active').fadeOut();
        $(this).parent().prev().removeClass('active');
      }
    });  
  }

  return {
    init: init 
  };

})();

tenacitas.services = (function () {
    /**
   * Initialize services
   *
   * @function init
   * @memberof! tenacitas.services
   */
  function init() {
    if ($('.services').length) { 
      $( '.services__block:odd' ).addClass('services__block--right');
      $( '.footer' ).addClass('footer--float');
    }
  }

  return {
    init: init 
  };

})();

tenacitas.newsPage = (function () {

  function init() {

    if ($('.js-filter').length) { 

      $(document).ready(hideOld);

      $(window).load(function(){ 
        initMasnry(); 
      });  

      $('.filter').on('click', function(e){
        console.log('click')
        setTimeout(function(){ 
          currentHash();   
        }, 200); 
      });
      
    }

  }

  function hideOld() {
    var currentDate = $('#js-post-old').attr('class');
    console.log(currentDate);

    $('.news__item').each(function(){
      if (!$(this).hasClass(currentDate)) {
        $(this).addClass('older');
      }
    });

    $('.js-archive').on('click', function(e){
      $('.news__item').removeClass('older');
    }); 

  }

  function currentHash() {
    var container = $('#js-news-archive').isotope(),
        urlHash = location.hash;

    // get url hash and apply appropriate content filter

    switch (urlHash) {
      case '#all':
        $('#js-news-archive').isotope({filter: '*'});
        break;
      case '#news':
        console.log('news');
        $('#js-news-archive').isotope({filter: '.News'}); 
        $('.js-viewMore').parent().hide();
        $('.news__item').removeClass('visibile');
        break;
      case '#reports':
        $('#js-news-archive').isotope({filter: '.Reports'});
        $('.js-viewMore').parent().hide();
        $('.news__item').removeClass('visibile');
        break;
      case '#insight':
        $('#js-news-archive').isotope({filter: '.Insight'});
        $('.js-viewMore').parent().hide();
        $('.news__item').removeClass('visibile');
        break;
    }
  }

  function initMasnry() {
    // var container = document.querySelector('#js-news');
    $('#js-news-archive').isotope({
      itemSelector: '.news__item'
    });
  }

  return {
    init: init 
  };

})();

tenacitas.newsArticle = (function () {

  function init() {
    if ($('.news-article').length) { 
      $('#menu-item-86').addClass('current_page_item');
    }
  }

  return {
    init: init 
  };

})();

tenacitas.contact = (function () {

  function init() {

    if ($('#js-map').length) { 
      var map;
      function initialize() {
        var myLatlng = new google.maps.LatLng(25.7606013, -80.1914913);
        var styles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e9e5dc"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#e9e5dc"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#005d98"}]}];
        var styledMap = new google.maps.StyledMapType(styles,
          {name: "Styled Map"});

        var mapOptions = {
          zoom: 10,
          center: myLatlng,
          scrollwheel: false,
          panControl: false,
          zoomControl: true,
          scaleControl: false,
          mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
          }
        };
        var iconBase = '/wp-content/themes/jfd/img/maps-marker.png';

        var marker = new google.maps.Marker({
          position: myLatlng,
          icon: iconBase
        });

        var map = new google.maps.Map(document.getElementById('js-map'),
          mapOptions);

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style');
        marker.setMap(map);
      }

      google.maps.event.addDomListener(window, 'load', initialize);

      // $('.map').css({opacity: 0});

      setTimeout(function(){ 
          $('.map').removeClass('open');
      }, 300);

      $('.js-map-open').click( function(e){
        e.preventDefault();
        var urlTarget = this.hash,
            target = $(urlTarget);

        $('.map').addClass('open');

        $('html, body').stop().animate({
          'scrollTop': target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = urlTarget;
        });
      });

      $('.js-map-close').click( function(e){
        $('.map').removeClass('open');
      });
    }

  }

  return {
    init: init 
  };

})();

$(function() {
  window.tenacitas.home.init();
  window.tenacitas.news.init();
  window.tenacitas.menu.init();
  window.tenacitas.scroll.init();
  window.tenacitas.team.init();
  window.tenacitas.services.init();
  window.tenacitas.newsPage.init();
  window.tenacitas.newsArticle.init();
  window.tenacitas.contact.init();
});

