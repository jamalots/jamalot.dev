@extends('layouts.master')

@section('styles')

<style type="text/css" href="http://avaz.me/cdn/animate.min.css"></style>
<style type="text/css">
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

body{
  background: #000;
  color: #fff;
  padding: 40px;
  font-family: sans-serif;
  max-width: 960px;
  margin: 0 auto;
  margin-left: 79px;
  padding-top: 85px;
"
}

.gallery{
  margin: 0;
  padding: 0;
  height: 100%;
}

[class*='thumbnail-']{
  background: #000;
  width: 33.33%;
  height: auto;
  float: left;
  padding: 5px 5px 3px 5px;
  cursor: zoom-in;
}

[class*='thumbnail-'] img{
  max-width: 100%;
}

[class*='large-']{
  background: #000;
  width: 90%;
  margin: 0 auto;
  padding: 30px;
  display: none;
}

[class*='large-'] img{
  width: 100%;
  max-width: 100%;
  margin: 0 auto;
}

.prev{
  color: #fff;
  font-size: 60px;
  position: absolute;
  top: 45%;
  left: 10px;
  float: left;
}

.next{
  color: #fff;
  font-size: 60px;
  position: absolute;
  top: 45%;
  right: 10px;
  float: right;
}

.close{
  color: white;
  font-size: 30px;
  position: absolute;
  top: 84px;
  right: 180px;
  float: right;
  cursor: zoom-out;
  opacity: .6;
}

[class*='thumbnail-']{
  overflow: hidden;
  padding: 0;
  position: relative;
  cursor: zoom-in;
}

[class*='thumbnail-']:hover img{
  transition: .3s linear;
  transition-delay: 300ms;
  transform: /* rotate(5deg) */ scale(1.4);
}

[class*='thumbnail-'] > .caption{
  display: none;
  position: absolute;
  bottom: 0;
  padding: 15px;
  width: 100%;
  background-color: black;
  color: white;
  opacity: 0.8;
}

[class*='thumbnail-']:hover > .caption{
  display: block;
 
}

@media screen and (max-width:480px){
  .caption h3{
    font-size: 12px;
  }
}

</style>

@stop

@section('content')

<div class="gallery">
  <?php 
      $count = 1;
      foreach ($images as $image)
      { //foreach as shown in question

          if($count==1){ ?>
              <div class="thumbnail-{{ $image->id }} wow fadeInLeft">
            <img src="{{ $image->img }}" alt="" />
            <div class="caption">
              <h3 class="wow fadeInUp">{{ $image->description }}</h3>
            </div>  
        </div>
        <div class="large-{{ $image->id }} wow bounceInLeft">
            <img src="{{ $image->img }}" alt="" />
            <span class="close">X</span>
        </div>
          <?php } elseif($count==2){ ?>
              <div class="thumbnail-{{ $image->id }} wow fadeInDown">
            <img src="{{ $image->img }}" alt="" />
            <div class="caption">
              <h3 class="wow fadeInUp">{{ $image->description }}</h3>
            </div>  
        </div>
        <div class="large-{{ $image->id }} wow bounceInDown">
            <img src="{{ $image->img }}" alt="" />
            <span class="close">X</span>
        </div>
          <?php } elseif($count==3){ ?>
            <div class="thumbnail-{{ $image->id }} wow fadeInRight">
            <img src="{{ $image->img }}" alt="" />
            <div class="caption">
              <h3 class="wow fadeInUp">{{ $image->description }}</h3>
            </div>  
        </div>
        <div class="large-{{ $image->id }} wow bounceInRight">
            <img src="{{ $image->img }}" alt="" />
            <span class="close">X</span>
        </div>
          <?php 
            $count = 0; 
        }

          $count++;
      } //end foreach
  ?>
</div>


<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://avaz.me/cdn/wow.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("[class^='thumbnail-']").click(function(){
    $("[class^='thumbnail-']").slideToggle("fast");
    $(this).next("[class^='large-']").slideToggle();
  });
  
  $(".close").click(function(){
    $("[class^='large-']:visible").toggle();
    $("[class^='thumbnail-']").fadeToggle("fast");; 
  }); 
  
});

new WOW().init();

</script>

@stop