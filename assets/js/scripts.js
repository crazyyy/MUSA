(function () {
  var method
  var noop = function () { }
  var methods = [
    "assert",
    "clear",
    "count",
    "debug",
    "dir",
    "dirxml",
    "error",
    "exception",
    "group",
    "groupCollapsed",
    "groupEnd",
    "info",
    "log",
    "markTimeline",
    "profile",
    "profileEnd",
    "table",
    "time",
    "timeEnd",
    "timeline",
    "timelineEnd",
    "timeStamp",
    "trace",
    "warn"
  ]
  var length = methods.length
  var console = (window.console = window.console || {})
  while (length--) {
    method = methods[length]
    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop
    }
  }
})()
if (typeof jQuery === "undefined") {
  console.warn("jQuery hasn't loaded")
} else {
  console.log("jQuery " + jQuery.fn.jquery + " has loaded")
}
// Place any jQuery/helper plugins in here.
// (function(){
//   $('.header--lang select').selectric({
//     optionsItemBuilder: function(itemData, element, index) {
//       return element.val().length ? '<span class="ico ico-' + element.val() +  '"></span>' + itemData.text : itemData.text;
//     }
//   });
// })()
var UID = {
  _current: 0,
  getNew: function () {
    this._current++;
    return this._current;
  }
};
HTMLElement.prototype.pseudoStyle = function (element, prop, value) {
  var _this = this;
  var _sheetId = "pseudoStyles";
  var _head = document.head || document.getElementsByTagName('head')[0];
  var _sheet = document.getElementById(_sheetId) || document.createElement('style');
  _sheet.id = _sheetId;
  var className = "pseudoStyle" + UID.getNew();

  _this.className += " " + className;
  if (prop == 'content') {
    _sheet.innerHTML += "\n." + className + ":" + element + "{" + prop + " : '" + value + "' !important}";
  } else {
    _sheet.innerHTML += "\n." + className + ":" + element + "{" + prop + " : " + value + "}";
  }

  _head.appendChild(_sheet);
  return this;
};

(function () {
  const ViewPort = {
    width: Math.max(document.documentElement.clientWidth, window.innerWidth || 0),
    init: function () {
      this.update();
      window.onresize = function () {
        ViewPort.update()
      }
    },
    update: function () {
      // console.log(`prev / next = ${this.width} / ${Math.max(document.documentElement.clientWidth, window.innerWidth || 0)}`)
      this.width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    },
    isSizeXS: function () {
      return (this.width >= 320) && (this.width <= 575);
    },
    isSizeSM: function () {
      return (this.width >= 576) && (this.width <= 767);
    },
    isSizeMD: function () {
      return (this.width >= 768) && (this.width <= 991);
    },
    isSizeLG: function () {
      return (this.width >= 992) && (this.width <= 1199);
    },
    isSizeXL: function () {
      return (this.width >= 1200);
    },
    isMobile: function () {
      return (this.width <= 767);
    },
    isDesktop: function () {
      return (this.width >= 992);
    },
    is: function (taskname) {
      let statement = this[taskname]();
      if (statement) {
        console.log(`%c ${taskname} => %ctrue`, "font-size:12px; color: white", "font-size:12px; color: green");
      } else {
        console.log(`%c ${taskname} => %cfalse`, "font-size:12px; color: gray", "font-size:12px; color: red");
      }
    },
    showAll: function () {
      ['isMobile', 'isDesktop', 'isSizeXS', 'isSizeSM', 'isSizeMD', 'isSizeLG', 'isSizeXL'].map((taskname) => {
        this.is(taskname)
      })
    }
  }
  ViewPort.init();

  const Utils = {
    SetLanguageIcoNav: function (language) {
      if (!language.length > 0) { return false }
      let $current_option = $('.option[data-lang="' + language + '"]');
      let $current_ico_clone = $current_option.find('.ico').clone();
      let $current_label_clone = $current_option.find('.label').clone();
      let $selected_value_container = $('#selected-value');
      $selected_value_container.html($current_ico_clone).append($current_label_clone);
      $current_option.hide()
    },
    ShowHideHeaderSearch: function () {
      if (!ViewPort.isSizeLG()) { return } else {
        let $container_header_search = $('.header--search');
        let $header_search_form = $('.header--search form');
        $container_header_search.attr('data-width', $container_header_search.width())

        if (!$container_header_search.hasClass('header--search__mobile')) {
          $container_header_search.addClass('header--search__mobile')
          $header_search_form.animate({
            width: '310px'
          }, 300)
          $header_search_form.html(`${$header_search_form.html()} <button class="btn btn-blue btn-searchsubmit"><i class="ico ico-search"></i></button>`)
          $header_search_form.find('button').animate({
            width: '40px'
          }, 300).show()
          $('.search-input').focus();
          $('.search-input').focusout(function (e) {
            if (!ViewPort.isSizeLG()) { return } else {
              $('.header--search form').animate({
                width: $container_header_search.attr('data-width')
              }, 300)
              setTimeout(() => {
                $header_search_form.find('button').remove();
                $('.header--search form').width('auto')
                $container_header_search.removeClass('header--search__mobile');
              }, 600);
              setTimeout(() => {
                $('.search-input').on('click', function (e) {
                  Utils.ShowHideHeaderSearch()
                })
              }, 1000);
            }
          })
        }
      }
    }
  }

  let articleSliderCarousel = $('.article-slider--carousel');
  if (articleSliderCarousel) {
    articleSliderCarousel.owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      margin: 10,
      autoplay: true,
      // slideTransition: 1000,
      lazyLoad: true,
      // autoplayTimeout: 30000000,
      autoplayTimeout: 5000,
      autoplayHoverPause: true
    });
  }
  let relativecitiesCarousel = $('.relativecities--carousel');
  if (relativecitiesCarousel) {
    relativecitiesCarousel.owlCarousel({
      items: 4,
      loop: true,
      nav: false,
      margin: 30,
      autoplay: true,
      // slideTransition: 1000,
      lazyLoad: true,
      // autoplayTimeout: 30000000,
      autoplayTimeout: 10000,
      autoplayHoverPause: true,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: false,
          loop: true
        },
        768: {
          items: 3,
          nav: false
        },
        992: {
          items: 4,
          nav: false
        }
      }
    });
  }
  let toprankCarousel = $('.toprank--carousel');
  if (toprankCarousel) {
    toprankCarousel.owlCarousel({
      items: 4,
      loop: true,
      nav: false,
      margin: 30,
      autoplay: true,
      // slideTransition: 1000,
      lazyLoad: true,
      autoplayTimeout: 10000,
      // autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: false,
          loop: true
        },
        768: {
          items: 3,
          nav: false
        },
        992: {
          items: 4,
          nav: false
        }
      }
    });
  }
  let $pagecontractTabs = $('.pagecontract-tabs');
  if ($pagecontractTabs) {
    let $pagecontractTablinks = $pagecontractTabs.find('.pagecontract--tablinks');
    $pagecontractTablinks.on('click', function (e) {
      if ($(this).hasClass('pagecontract--tablinks__active') === false) {
        let link = $(this).attr('data-link'),
          id = $(this).attr('data-id'),
          title = $(this).attr('data-title'),
          pagecontractTabcontentID = '#' + id,
          $pagecontractDownload = $('.pagecontract-download a'),
          $pagecontractTabContentActive = $('.pagecontract-tabcontent__active'),
          $pagecontractNewTabContent = $(pagecontractTabcontentID);
        $pagecontractDownload.attr('href', link).attr('title', title);
        $('.pagecontract--tablinks__active').removeClass('pagecontract--tablinks__active');
        $pagecontractTabContentActive.removeClass('pagecontract-tabcontent__active');
        $pagecontractNewTabContent.addClass('pagecontract-tabcontent__active');
        $(this).addClass('pagecontract--tablinks__active');
      } else {
        return;
      }
    })
  }

  $('.home-slider--searchform').on('click', '.searchform--tab', function (e) {
    e.preventDefault();
    if (!$(this).hasClass('searchform--tab__active')) {
      let next_id = $(this).data('id');
      $('.searchform--content__active').removeClass('searchform--content__active')
      $(next_id).addClass('searchform--content__active');
      $('.searchform--tab__active').removeClass('searchform--tab__active')
      $(this).addClass('searchform--tab__active')
    }
  })

  $('.searchform--content').on('click', '.btn-blue', function (e) {
    e.preventDefault();
    console.log('searchform--content')

    // search filed
    const $areas = $('#areas');
    const $levels = $('#levels');
    const $languages = $('#languages');
    const $languages2 = $('#languages2');
    const $types = $('#types');
    const $regions = $('#regions');

    const searchData = {
      'action': 'ncAction',
      'areas': $areas.val() || '',
      'levels': $levels.val() || '',
      'languages': $languages.val() || $languages2.val(),
      'types': $types.val() || '',
      'regions': $regions.val() || '',
    }

    console.log(searchData)
    $.ajax({
      url: adminAjax.ajaxurl,
      data: searchData,
      dataType: 'json',
      // contentType: "application/json; charset=utf-8",
      method: 'POST', //Post method
      success: function (response) {
        console.log(response);
        console.log('success: ' + response.success);
        console.log(response.data);

        // const resultData = JSON.parse(response.data)
        // console.log(resultData);

      },
      error: function (error) { console.log(error) }
    })

  })

  $('.header--nav .headnav > li').hover(
    function () {
      let subNav = $(this).children('.sub-menu');
      if (subNav.length > 0) {
        $('.header--dark').addClass('header--dark--hovered')
      }
    },
    function () {
      $('.header--dark').removeClass('header--dark--hovered')
    }
  )

  $('body.home .howtoproceed-title').text('How to become student')

  let wpml_language = $('body').attr('data-lang')
  Utils.SetLanguageIcoNav(wpml_language);

  $('#options .option').on('click', function (e) {
    let shwitch_to_language = e.currentTarget.dataset.lang;
    $(document.body).css({ 'cursor': 'wait' });
    Utils.SetLanguageIcoNav(shwitch_to_language)
    window.location.replace('?lang=' + shwitch_to_language);
  })

  $('.search-input').on('click', function (e) {
    Utils.ShowHideHeaderSearch()
  })

  $('.search-input').hover(
    function () {
      Utils.ShowHideHeaderSearch()
    }, function () {
      // ShowHideHeaderSearch()
    }
  )

  $('.header--button__admission').on('click', function (e) {
    ViewPort.showAll()
  })

  $('.footer--widget h6').on('click', function (e) {
    let $footer_container = $(this).parent();
    let $footer_ul_container = $(this).next('ul');
    if ($footer_container.hasClass('footer--widget__opened')) {
      $footer_ul_container.fadeOut('slow');
    } else {
      $footer_ul_container.fadeIn('slow');
    }
    $footer_container.toggleClass('footer--widget__opened');

  })

  $('.footer--nav__switcher').on('click', function (e) {
    let $nav_container = $(this).parent();
    let $ul_container = $(this).next('ul');
    if ($nav_container.hasClass('footer--nav--opened')) {
      $ul_container.fadeOut('slow');
    } else {
      $ul_container.fadeIn('slow');
    }
    $nav_container.toggleClass('footer--nav--opened');
  })

  $('.btn--mobswitch').on('click', function (e) {
    if (!ViewPort.isMobile()) { return false }
    $('header').toggleClass('menu-expanded');
  })

  $('.headnav > .menu-item-has-children > li').attr('data-opened', 0);

  $('.headnav > .menu-item-has-children > a').on('click', function (e) {
    if (!ViewPort.isMobile()) { return false }
    const $parent_li = $(this).parent('li');
    const openstatus = $parent_li.attr('data-opened');
    if (openstatus == 1) {
      // e.preventDefault();
      // console.log('opened and go default event')
      // return false
    } else {
      $parent_li.addClass('menu--show-submenu');
      $parent_li.attr('data-opened', 1);
      return false
    }
  })


})();
$(document).ready(function () {
  autoPlayYouTubeModal();

  $('.custom-file-upload input[type="file"]').change(function (event) {
    let i = $('.custom-file-upload').clone();
    let file = $(this)[0].files[0].name;
    // $('.custom-file-upload').text(file);
    var label = document.getElementsByClassName("custom-file-upload")[0];
    label.pseudoStyle("before", "content", file);
    $('.custom-file-upload').addClass('custom-file-upload__filename')
  });

  $('#select-button').on('click', function (e) {
    $(e).stopPropagation();
  })
  $('#select-box').on('click', function (e) {
    $('body').toggleClass('select-box--opened');
  })
  $('#select-box').hover(
    function (e) {
      $('body').addClass('select-box--opened');
    },
    function () {
      $('body').removeClass('select-box--opened');
    }
  )
  $('.select-box--opened').on('click', function (e) {
    console.log(e)
    // $('#select-box').stopPropagation();
    $('body').toggleClass('select-box--opened');
  })

});

function autoPlayYouTubeModal() {
  var trigger = $('.yt-play');
  trigger.click(function (e) {
    e.preventDefault();
    var theModal = $(this).data("target");
    var videoSRC = $(this).attr("src");
    var videoSRCauto = videoSRC + "?autoplay=1";
    $(theModal + ' iframe').attr('src', '');
    $(theModal + ' iframe').attr('src', videoSRCauto);
    $(theModal).on('hidden.bs.modal', function (e) {
      $(theModal + ' iframe').attr('src', '');
    });
  });
}


(function ($) {
  /*
   *  new_map
   *
   *  This function will render a Google Map onto the selected jQuery element
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	4.3.0
   *
   *  @param	$el (jQuery element)
   *  @return	n/a
   */
  function new_map($el) {
    // var
    var $markers = $el.find('.marker');
    // vars
    var args = {
      zoom: 16,
      center: new google.maps.LatLng(0, 0),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    // create map
    var map = new google.maps.Map($el[0], args);
    // add a markers reference
    map.markers = [];
    // add markers
    $markers.each(function () {
      add_marker($(this), map);
    });
    // center map
    center_map(map);
    // return
    return map;
  }
  /*
   *  add_marker
   *
   *  This function will add a marker to the selected Google Map
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	4.3.0
   *
   *  @param	$marker (jQuery element)
   *  @param	map (Google Map object)
   *  @return	n/a
   */
  function add_marker($marker, map) {
    // var
    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
    // create marker
    var marker = new google.maps.Marker({
      position: latlng,
      map: map
    });
    // add to array
    map.markers.push(marker);
    // if marker contains HTML, add it to an infoWindow
    if ($marker.html()) {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content: $marker.html()
      });
      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
      });
    }
  }
  /*
   *  center_map
   *
   *  This function will center the map, showing all markers attached to this map
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	4.3.0
   *
   *  @param	map (Google Map object)
   *  @return	n/a
   */
  function center_map(map) {
    // vars
    var bounds = new google.maps.LatLngBounds();
    // loop through all markers and create bounds
    $.each(map.markers, function (i, marker) {
      var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
      bounds.extend(latlng);
    });
    // only 1 marker?
    if (map.markers.length == 1) {
      // set center of map
      map.setCenter(bounds.getCenter());
      map.setZoom(16);
    } else {
      // fit to bounds
      map.fitBounds(bounds);
    }
  }
  /*
   *  document ready
   *
   *  This function will render each map when the document is ready (page has loaded)
   *
   *  @type	function
   *  @date	8/11/2013
   *  @since	5.0.0
   *
   *  @param	n/a
   *  @return	n/a
   */
  // global var
  var map = null;
  $(document).ready(function () {
    $('.contactus--map').each(function () {
      // create map
      map = new_map($(this));
    });
  });
})(jQuery);
