"use strict";!function(){for(var e,t=function(){},a=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],o=a.length,n=window.console=window.console||{};o--;)n[e=a[o]]||(n[e]=t)}(),"undefined"==typeof jQuery?console.warn("jQuery hasn't loaded"):console.log("jQuery "+jQuery.fn.jquery+" has loaded");var UID={_current:0,getNew:function(){return this._current++,this._current}};function autoPlayYouTubeModal(){$(".yt-play").click(function(e){e.preventDefault();var t=$(this).data("target"),a=$(this).attr("src")+"?autoplay=1";$(t+" iframe").attr("src",""),$(t+" iframe").attr("src",a),$(t).on("hidden.bs.modal",function(e){$(t+" iframe").attr("src","")})})}HTMLElement.prototype.pseudoStyle=function(e,t,a){var o="pseudoStyles",n=document.head||document.getElementsByTagName("head")[0],r=document.getElementById(o)||document.createElement("style");r.id=o;var i="pseudoStyle"+UID.getNew();return this.className+=" "+i,r.innerHTML+="content"==t?"\n."+i+":"+e+"{"+t+" : '"+a+"' !important}":"\n."+i+":"+e+"{"+t+" : "+a+"}",console.log(r.innerHTML),n.appendChild(r),this},function(){var e=$(".article-slider--carousel");e&&e.owlCarousel({items:1,loop:!0,nav:!0,margin:10,autoplay:!0,lazyLoad:!0,autoplayTimeout:5e3,autoplayHoverPause:!0});var t=$(".relativecities--carousel");t&&t.owlCarousel({items:4,loop:!0,nav:!1,margin:30,autoplay:!0,lazyLoad:!0,autoplayTimeout:1e4,autoplayHoverPause:!0});var a=$(".toprank--carousel");a&&a.owlCarousel({items:4,loop:!0,nav:!1,margin:30,autoplay:!0,lazyLoad:!0,autoplayTimeout:1e4,autoplayHoverPause:!0});var o=$(".pagecontract-tabs");o&&o.find(".pagecontract--tablinks").on("click",function(e){if(!1===$(this).hasClass("pagecontract--tablinks__active")){var t=$(this).attr("data-link"),a=$(this).attr("data-id"),o=$(this).attr("data-title"),n="#"+a,r=$(".pagecontract-download a"),i=$(".pagecontract-tabcontent__active"),s=$(n);r.attr("href",t).attr("title",o),$(".pagecontract--tablinks__active").removeClass("pagecontract--tablinks__active"),i.removeClass("pagecontract-tabcontent__active"),s.addClass("pagecontract-tabcontent__active"),$(this).addClass("pagecontract--tablinks__active")}});$(".searchform--tab").on("click",function(e){if(e.preventDefault(),!$(this).hasClass("searchform--tab__active")){var t=$(this).data("id");$(".searchform--content__active").removeClass("searchform--content__active"),$(t).addClass("searchform--content__active"),$(".searchform--tab__active").removeClass("searchform--tab__active"),$(this).addClass("searchform--tab__active")}}),$(".header--nav .headnav > li").hover(function(){0<$(this).children(".sub-menu").length&&$(".header--dark").addClass("header--dark--hovered")},function(){$(".header--dark").removeClass("header--dark--hovered")}),$("body.home .howtoproceed-title").text("How to become student")}(),$(document).ready(function(){autoPlayYouTubeModal(),$('.custom-file-upload input[type="file"]').change(function(e){$(".custom-file-upload").clone();var t=$(this)[0].files[0].name;console.log(t),document.getElementsByClassName("custom-file-upload")[0].pseudoStyle("before","content",t),$(".custom-file-upload").addClass("custom-file-upload__filename")})}),function(n){function e(e){var t=e.find(".marker"),a={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},o=new google.maps.Map(e[0],a);return o.markers=[],t.each(function(){!function(e,t){var a=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),o=new google.maps.Marker({position:a,map:t});if(t.markers.push(o),e.html()){var n=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(o,"click",function(){n.open(t,o)})}}(n(this),o)}),function(e){var o=new google.maps.LatLngBounds;n.each(e.markers,function(e,t){var a=new google.maps.LatLng(t.position.lat(),t.position.lng());o.extend(a)}),1==e.markers.length?(e.setCenter(o.getCenter()),e.setZoom(16)):e.fitBounds(o)}(o),o}n(document).ready(function(){n(".contactus--map").each(function(){e(n(this))})})}(jQuery);