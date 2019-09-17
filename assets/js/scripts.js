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
      lazyLoad:true,
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
      lazyLoad:true,
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
      lazyLoad:true,
      autoplayTimeout: 10000,
      // autoplayTimeout: 3000,
      autoplayHoverPause: true
    });
  }

  let $pagecontractTabs = $('.pagecontract-tabs');
  if ($pagecontractTabs) {
    let $pagecontractTablinks = $pagecontractTabs.find('.pagecontract--tablinks');
    $pagecontractTablinks.on('click', function(e){
      if($(this).hasClass('pagecontract--tablinks__active') === false) {
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

$(document).ready(function() {
  autoPlayYouTubeModal();
});

function autoPlayYouTubeModal() {
  var trigger = $('.yt-play');
  trigger.click(function(e) {
    e.preventDefault();
    var theModal = $(this).data("target");
    var videoSRC = $(this).attr("src");
    var videoSRCauto = videoSRC + "?autoplay=1";
    $(theModal + ' iframe').attr('src', '');
    $(theModal + ' iframe').attr('src', videoSRCauto);
    $(theModal).on('hidden.bs.modal', function(e) {
      $(theModal + ' iframe').attr('src', '');
    });
  });
};
