(function () {
  var method
  var noop = function () {}
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

(function () {
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
      autoplayHoverPause: true
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
      autoplayHoverPause: true
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

})();

$(document).ready(function () {
  autoPlayYouTubeModal();
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
};


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
