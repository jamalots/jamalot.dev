@extends('layouts.master')

<style>
*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html, body {
  font-size: 62.5%;
}
@media (max-width: 991px) {
  html, body {
    font-size: 50%;
  }
}
@media (max-width: 768px) {
  html, body {
    font-size: 40%;
  }
}

body {
  background: #777;
  background-color: black; 
}

.slider3d__inner, .slider3d__rotater, .slider3d__handle__inner, .slider3d__handle__rotater {
  position: relative;
  height: 100%;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.slider3d {
  overflow: hidden;
  position: relative;
  height: 100vh;
  font-family: "Open Sans", Helvetica, Arial, sans-serif;
}
.slider3d.no-select {
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.slider3d__wrapper {
  z-index: 1;
  position: relative;
  height: 100%;
}
.slider3d__item {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  background-color: #000;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}
.slider3d__item:nth-child(1) {
  background-image: url("/img/castle.jpg");
}
.slider3d__item:nth-child(2) {
  background-image: url("/img/castle3.jpg");
}
.slider3d__item:nth-child(3) {
  background-image: url("/img/starburst.jpg");
}
.slider3d__item:nth-child(4) {
  background-image: url("http://i.imgur.com/njcLNVE.jpg");
}
.slider3d__item:nth-child(5) {
  background-image: url("http://i.imgur.com/UP7fWfg.jpg");
}
.slider3d__heading {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  margin-top: -6rem;
  text-align: center;
  font-size: 12rem;
  line-height: 1;
  text-transform: uppercase;
  color: #ffffff;
  -webkit-transform: translateZ(3rem) scale(0.5);
          transform: translateZ(3rem) scale(0.5);
  opacity: 0;
  text-shadow: 0.02rem -0.03rem 0 #efefef, 0.04rem -0.06rem 0 #eeeeee, 0.06rem -0.09rem 0 #ededed, 0.08rem -0.12rem 0 #ededed, 0.1rem -0.15rem 0 #ececec, 0.12rem -0.18rem 0 #ebebeb, 0.14rem -0.21rem 0 #eaeaea, 0.16rem -0.24rem 0 #eaeaea, 0.18rem -0.27rem 0 #e9e9e9, 0.2rem -0.3rem 0 #e8e8e8, 0.22rem -0.33rem 0 #e7e7e7, 0.24rem -0.36rem 0 #e7e7e7, 0.26rem -0.39rem 0 #e6e6e6, 0.28rem -0.42rem 0 #e5e5e5, 0.3rem -0.45rem 0 #e4e4e4, 0.32rem -0.48rem 0 #e3e3e3, 0.34rem -0.51rem 0 #e3e3e3, 0.36rem -0.54rem 0 #e2e2e2, 0.38rem -0.57rem 0 #e1e1e1, 0.4rem -0.6rem 0 #e0e0e0, 0.42rem -0.63rem 0 #e0e0e0, 0.44rem -0.66rem 0 #dfdfdf, 0.46rem -0.69rem 0 #dedede, 0.48rem -0.72rem 0 #dddddd, 0.5rem -0.75rem 0 #dddddd, 0.52rem -0.78rem 0 gainsboro, 0.54rem -0.81rem 0 #dbdbdb, 0.56rem -0.84rem 0 #dadada, 0.58rem -0.87rem 0 #dadada, 0.6rem -0.9rem 0 #d9d9d9, 0.62rem -0.93rem 0 #d8d8d8, 0.64rem -0.96rem 0 #d7d7d7, 0.66rem -0.99rem 0 #d6d6d6, 0.68rem -1.02rem 0 #d6d6d6, 0.7rem -1.05rem 0 #d5d5d5, 0.72rem -1.08rem 0 #d4d4d4, 0.74rem -1.11rem 0 lightgray, 0.76rem -1.14rem 0 lightgray;
  -webkit-transition: -webkit-transform 0.4s, opacity 0.4s;
          transition: transform 0.4s, opacity 0.4s;
  -webkit-transition-delay: 0.2s;
          transition-delay: 0.2s;
  -webkit-transition-timing-function: cubic-bezier(0.71, 0.59, 0.4, 1.5);
          transition-timing-function: cubic-bezier(0.71, 0.59, 0.4, 1.5);
}
.slider3d.slider-ready .slider3d__heading {
  -webkit-transform: translateZ(3rem);
          transform: translateZ(3rem);
  opacity: 1;
}
.slider3d__controls {
  display: none;
}
.slider3d.with-controls .slider3d__controls {
  display: block;
}
.slider3d__handle {
  z-index: 2;
  position: absolute;
  right: 0;
  top: 50%;
  width: 15rem;
  height: 7rem;
  margin-top: -3.5rem;
  -webkit-perspective-origin: 100% 50%;
          perspective-origin: 100% 50%;
  cursor: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNCAyNCI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTkuNCA0LjhsLTIuOS0yLjhoOC41djguNWwtMi44LTIuOHMtMS4yIDEuNC0xLjIgNC4zYzAgMy4xIDEuMiA0LjQgMS4yIDQuNGwyLjgtMi45djguNWgtOC41bDIuOC0yLjhzLTIuMy0yLjItMi4zLTcuMmMwLTQuOSAyLjQtNy4yIDIuNC03LjJ6Ii8+PHBhdGggZD0iTTEyLjIgNi4zcy0yLjIgMS44LTIuMiA1LjdjMCA0LjEgMi4xIDUuOCAyLjEgNS44bDEuOC0xLjh2NWgtNWwxLjgtMS44cy0yLjctMi4xLTIuNy03LjJjMC01IDIuOC03LjEgMi44LTcuMWwtMS45LTEuOWg1LjF2NS4xbC0xLjgtMS44Ii8+PC9zdmc+"), ns-resize;
}
.m--xAxis .slider3d__handle {
  left: 50%;
  right: auto;
  top: auto;
  bottom: 0;
  margin-left: -7.5rem;
  margin-top: 0;
  -webkit-perspective-origin: 50% 100%;
          perspective-origin: 50% 100%;
}
.slider3d__handle__item {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #000;
  text-align: center;
  font-size: 1.8rem;
  line-height: 7rem;
  text-transform: uppercase;
  font-weight: bold;
  color: #fff;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.slider3d__handle__item:after {
  content: "";
  z-index: -1;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.1);
  -webkit-transition: opacity 0.3s;
          transition: opacity 0.3s;
}
.slider3d__handle__item.active:after {
  opacity: 0;
}
.slider3d__control {
  z-index: 3;
  position: absolute;
  right: 0;
  top: 50%;
  width: 15rem;
  height: 4rem;
  margin-top: -2rem;
  cursor: pointer;
}
.m--xAxis .slider3d__control {
  left: 50%;
  right: auto;
  top: auto;
  bottom: 0;
  width: 6rem;
  height: 7rem;
  margin-top: 0;
  margin-left: -3rem;
}
.slider3d__control:after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  width: 1rem;
  height: 1rem;
  margin-left: -0.5rem;
  margin-top: -0.5rem;
  border: 2px solid #fff;
  border-left: none;
  border-bottom: none;
}
.slider3d__control.m--up {
  -webkit-transform: translateY(-6rem);
      -ms-transform: translateY(-6rem);
          transform: translateY(-6rem);
}
.slider3d__control.m--up:after {
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.m--xAxis .slider3d__control.m--up {
  -webkit-transform: translateX(-11.5rem);
      -ms-transform: translateX(-11.5rem);
          transform: translateX(-11.5rem);
}
.m--xAxis .slider3d__control.m--up:after {
  -webkit-transform: rotate(-135deg);
      -ms-transform: rotate(-135deg);
          transform: rotate(-135deg);
}
.slider3d__control.m--down {
  -webkit-transform: translateY(6rem);
      -ms-transform: translateY(6rem);
          transform: translateY(6rem);
}
.slider3d__control.m--down:after {
  -webkit-transform: rotate(135deg);
      -ms-transform: rotate(135deg);
          transform: rotate(135deg);
}
.m--xAxis .slider3d__control.m--down {
  -webkit-transform: translateX(11.5rem);
      -ms-transform: translateX(11.5rem);
          transform: translateX(11.5rem);
}
.m--xAxis .slider3d__control.m--down:after {
  -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
          transform: rotate(45deg);
}
</style>

@section('content')

	<div class="slider3d first">
	  <div class="slider3d__wrapper">
	    <div class="slider3d__inner">
	      <div class="slider3d__rotater">
	        <div class="slider3d__item">
	          <h2 class="slider3d__heading" data-text="WELCOME TO JAMALOT">WELCOME TO JAMALOT</h2>
	        </div>
	        <div class="slider3d__item">
	          <h2 class="slider3d__heading" data-text="INCREASE YOUR MUSIC NETWORK">INCREASE YOUR MUSIC NETWORK</h2>
	        </div>
	        <div class="slider3d__item">
	          <h2 class="slider3d__heading" data-text="CREATE AND FIND JAMS">CREATE AND FIND JAMS</h2>
	        </div>
	        <div class="slider3d__item">
	          <h2 class="slider3d__heading" data-text="VENUE? FIND ARTISTS!">VENUE? FIND ARTISTS!</h2>
	        </div>
	        <div class="slider3d__item">
	          <h2 class="slider3d__heading" data-text="SIGN UP!">SIGN UP!</h2>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="slider3d__controls">
	    {{-- <div class="slider3d__handle">
	      <div class="slider3d__handle__inner">
	        <div class="slider3d__handle__rotater">
	          <div class="slider3d__handle__item active">Page 1</div>
	          <div class="slider3d__handle__item">Page 2</div>
	          <div class="slider3d__handle__item">Page 3</div>
	          <div class="slider3d__handle__item">Page 4</div>
	          <div class="slider3d__handle__item">Page 5</div>
	        </div>
	      </div>
	    </div> --}}
	    <div class="slider3d__control m--up"></div>
	    <div class="slider3d__control m--down"></div>
	  </div>
	</div>

<script>
(function() {
  var rotatingSlider = function(selector, options) {

    function initSingleSlider($el, options) {
      var $slider, $rotaters,
          $handle, $handleItems,
          numOfItems,
          angle, currentAngle = 0,
          prefix = ".slider3d__", 
          handlePrefix = prefix + "handle__",
          rotating = false;

      var defaultOptions = {
        xRotation: false,
        speed: 1100,
        dragSpeedCoef: 0.7,
        handleSpeedCoef: 6,
        easing: "ease",
        persMult: 1.6,
        handlePersMult: 3,
        scrollRotation: true,
        keysRotation: true,
        globalDragRotation: false,
        withControls: true,
        handleAndGlobalDrag: false,
        allowDragDuringAnim: false,
        allowScrollDuringAnim: false,
        allowKeysDuringAnim: false,
        allowControlsDuringAnim: false
      };

      var __opts = $.extend(defaultOptions, options);
      
      var axis = (__opts.xRotation) ? "Y" : "X";
      var angleMult = (__opts.xRotation) ? 1 : -1;

      function handleActiveItem() {
        if (!__opts.withControls) return;
        $handleItems.removeClass("active");
        var a = currentAngle % 360 / angle;
        if (a < 0) a = numOfItems + a;
        if (a > 0) a = a + 1;
        if (!a) a = 1;
        $handleItems.eq(a - 1).addClass("active");
      };

      function rotateSlider(delta) {
        var newAngle = currentAngle + delta * angle;

        $rotaters.css({"transform": "rotate"+axis+"("+ (newAngle * angleMult * -1) +"deg)",
                       "transition": "transform " + __opts.speed / 1000 + "s " + __opts.easing});
        currentAngle = newAngle;

        setTimeout(function() {
          $rotaters.css("transition", "transform 0s");
          handleActiveItem();
          rotating = false;
        }, __opts.speed);
      };
      
      function navigateUp() {
        rotateSlider(-1);
      };
      
      function navigateDown() {
        rotateSlider(1);
      };

      function scrollHandler(e) {
        if (rotating && !__opts.allowScrolluringAnim) return;
        rotating = true;
        var delta = e.originalEvent.wheelDelta || -e.originalEvent.detail;
        if (delta > 0) {
          navigateUp();
        } else if (delta < 0) {
          navigateDown();
        }
      };
      
      function keydownHandler(e) {
        if (rotating && !__opts.allowKeysDuringAnim) return;
        rotating = true;
        if (e.which === 38) {
          navigateUp();
        } else if (e.which === 40) {
          navigateDown();
        }
      }

      function dragRotationHandler(e) {
        if (rotating && !__opts.allowDragDuringAnim) return;
        rotating = true;
        $slider.addClass("no-select");
        
        var startVal;
        if (__opts.xRotation) {
          startVal = e.pageX || e.originalEvent.touches[0].pageX;
        } else {
          startVal = e.pageY || e.originalEvent.touches[0].pageY;
        }
        var sliderS = (__opts.xRotation) ? $slider.width() : $slider.height();
        var deltaVal = 0;
        var newAngle;
        var angleDelta;
        var isHandle = $(this).hasClass("js-handle");
        var rotationCoef;
        if (isHandle) {
          rotationCoef = __opts.handleSpeedCoef;
        } else {
          rotationCoef = __opts.dragSpeedCoef;
        }
        
        if (__opts.scrollRotation) {
          $slider.off("mousewheel DOMMouseScroll", scrollHandler);
        }

        $(document).on("mousemove touchmove", function(e) {
          var val;
          if (__opts.xRotation) {
            val = e.pageX || e.originalEvent.touches[0].pageX;
          } else {
            val = e.pageY || e.originalEvent.touches[0].pageY;
          }
          deltaVal = (startVal - val) / sliderS * rotationCoef;
          newAngle = currentAngle + deltaVal * angle;
          angleDelta = newAngle - currentAngle;

          $rotaters.css("transform", "rotate"+axis+"("+ (newAngle * angleMult * -1) +"deg)");
        });

        $(document).on("mouseup touchend", function(e) {
          $(document).off("mousemove touchmove mouseup touchend");
          $slider.removeClass("no-select");

          if (!deltaVal) {
            rotating = false;
            if (__opts.scrollRotation) {
              $slider.on("mousewheel DOMMouseScroll", scrollHandler);
            }
            return;
          }
          
          var slidesRotated = Math.round(angleDelta / angle);
          rotateSlider(slidesRotated);
          deltaVal = 0;

          setTimeout(function() {
            if (__opts.scrollRotation) {
              $slider.on("mousewheel DOMMouseScroll", scrollHandler);
            }
          }, __opts.speed);
        });

      };

      function initControls() {
        var $controls = $(prefix + "controls");
        $handle = $(prefix + "handle", $slider);
        var $handleInner = $(handlePrefix + "inner", $handle);
        $handleItems = $(handlePrefix + "item", $handle);
        var s = (__opts.xRotation) ? $handle.width() : $handle.height();
        var pers = s * __opts.handlePersMult;
        var depth = s / 2 / Math.tan(angle / 2 * Math.PI/180);
        
        $slider.addClass("with-controls");
        $handle.css({"-webkit-perspective": pers + "px",
                     "perspective": pers + "px"})
          .addClass("js-handle");
        $handleInner.css("transform", "translateZ(-"+ depth +"px)");
        
        if (__opts.xRotation) $controls.addClass("m--xAxis");

        $handleItems.each(function(index) {
          $(this).css("transform", "rotate"+axis+"("+ (index * angle * angleMult) +"deg) translateZ("+ depth +"px)");
        });

        $rotaters = $(prefix + "rotater, "+ handlePrefix + "rotater", $slider);
        
        $handle.on("mousedown touchstart", dragRotationHandler);
        
        $(document).on("click", ".slider3d__control", function() {
          if (rotating && !__opts.allowControlsDuringAnim) return;
          rotating = true;
          if ($(this).hasClass("m--up")) {
            navigateUp();
          } else {
            navigateDown();
          }
        });
      };

      function initSlider($el) {
        $slider = $el;
        var $wrapper = $(prefix + "wrapper", $slider);
        var $inner = $(prefix + "inner", $slider);
        var $items = $(prefix + "item", $slider);
        numOfItems = $items.length;
        angle = 360 / numOfItems;
        var s = (__opts.xRotation) ? $slider.width() : $slider.height();
        var pers = s * __opts.persMult;
        var depth = s / 2 / Math.tan(angle / 2 * Math.PI/180);

        $wrapper.css({"-webkit-perspective": pers + "px",
                      "perspective": pers + "px"});
        $inner.css("transform", "translateZ(-"+ depth +"px)");

        $items.each(function(index) {
          $(this).css("transform", "rotate"+axis+"("+ (index * angle * angleMult) +"deg) translateZ("+ depth +"px)");
        });

        $slider.addClass("slider-ready");

        $rotaters = $(prefix + "rotater", $slider);
        
        if (__opts.scrollRotation) {
          $slider.on("mousewheel DOMMouseScroll", scrollHandler);
        }
        if (__opts.keysRotation) {
          if (!$slider.attr("tabindex")) {
            $slider.attr("tabindex", 1);
          }
          $slider.on("keydown", keydownHandler);
        }
        if (__opts.globalDragRotation) {
          $slider.on("mousedown touchstart", dragRotationHandler);
        }
        if (__opts.withControls) {
          initControls();
        }
      };
      
      initSlider($el);
      
    }

    function globalInit() {
      $(selector).each(function() {
        initSingleSlider($(this), options);
      });
    };

    function debounce(func, wait, immediate) {
      var timeout;
      return function() {
        var context = this, args = arguments;
        var later = function() {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
      };
    };

    var resizeFn = debounce(function() {
      globalInit();
    }, 100);

    $(window).on("resize", resizeFn);

    globalInit();

  };

  window.rotatingSlider = rotatingSlider;
}());

$(document).ready(function() {

  rotatingSlider(".slider3d", {xRotation: false, globalDragRotation: true});

});
</script>

@stop
