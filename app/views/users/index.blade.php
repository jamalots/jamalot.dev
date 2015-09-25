@extends('layouts.master')

@section('content')

<style>
*:after, *:before, * {
  box-sizing: border-box;
  font-family: arial;
}

body {
  background: #1D1F20;
}

.media-row {
  display: table-row;
}

.thumbnail {
  display: table-cell;
  background: #fff;
  border: 1px solid #333;
  overflow: hidden;
  position: relative;
  height: 150px;
  width: 25%;
}
.thumbnail img {
  width: 100%;
  position: relative;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}
.thumbnail .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  background: rgba(0, 0, 0, 0.7);
  -webkit-transition: 0.3s;
  transition: 0.3s;
  z-index: 4;
  left: 0;
  top: 100%;
  text-align: center;
  color: #fff;
}
.thumbnail .overlay .zoom-btn {
  opacity: 0;
  top: 150px;
  -moz-transition: 0.4s 0.2s;
  -o-transition: 0.4s 0.2s;
  -webkit-transition: 0.4s;
  -webkit-transition-delay: 0.2s;
  -webkit-transition: 0.4s 0.2s;
          transition: 0.4s 0.2s;
}
.thumbnail .overlay h2 {
  position: relative;
  margin: 0 auto 15px;
  -moz-transition: 0.3s 0.25s;
  -o-transition: 0.3s 0.25s;
  -webkit-transition: 0.3s;
  -webkit-transition-delay: 0.25s;
  -webkit-transition: 0.3s 0.25s;
          transition: 0.3s 0.25s;
}
.thumbnail.open {
  border-color: #222;
  pointer-events: none;
}
.thumbnail.open:after {
  content: '';
  position: absolute;
  left: 50%;
  -ms-transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
  z-index: 5;
  bottom: 0;
  border: 15px solid transparent;
  border-bottom-color: #222;
}
.thumbnail:hover img, .thumbnail.open img {
  -ms-transform: rotate(-45deg) scale(2);
  -webkit-transform: rotate(-45deg) scale(2);
  transform: rotate(-45deg) scale(2);
}
.thumbnail:hover .overlay, .thumbnail.open .overlay {
  top: 0;
}
.thumbnail:hover .overlay h2, .thumbnail.open .overlay h2 {
  margin-top: 20%;
}
.thumbnail:hover .overlay .zoom-btn, .thumbnail.open .overlay .zoom-btn {
  top: 0;
  opacity: 1;
}

.zoom-btn {
  position: relative;
  width: 15px;
  height: 15px;
  display: inline-block;
  border: 2px solid;
  color: #f00;
  border-radius: 100%;
  -ms-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
  cursor: pointer;
}
.zoom-btn:before {
  content: '+';
  position: absolute;
  left: 2px;
  top: -4px;
  -ms-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
.zoom-btn:after {
  content: '';
  position: absolute;
  width: 2px;
  height: 10px;
  background: #f00;
  top: 100%;
  left: 0;
  right: 0;
  margin: auto;
}

.media-view {
  position: relative;
  background: #222;
  padding: 10px;
  overflow: hidden;
  *zoom: 1;
  width: 100%;
  display: none;
}
.media-view .media-thump {
  width: 70%;
  float: left;
}
.media-view .media-thump img {
  width: 100%;
  max-width: 640px;
  margin: auto;
  display: block;
}
.media-view .media-info {
  float: left;
  width: 30%;
  padding: 10px;
  color: #fff;
}
.media-view .media-info h2 {
  margin: 15px auto;
}
.media-view .media-info p {
  color: #bbb;
}
.media-view .close {
  position: absolute;
  right: 10px;
  top: 5px;
  font-weight: 200;
  color: #fff;
  font-size: 24px;
  opacity: .6;
  cursor: pointer;
  z-index: 4;
}

</style>
<link href="/css/index.css" rel="stylesheet">



{{-- alternate solution --}}
<div class="media">
  @foreach ($users->chunk(4) as $chunk)
    <div class="media-row">
        @foreach ($chunk as $user)
            <div class="thumbnail"><img src="{{ $user->img }}">
          <div class="overlay">
            <h2>{{ link_to_route('profile_path', $user->user_name, $user->user_name)}}</h2>
            <p>{{ $user->location }}</p><span class="zoom-btn"></span>
            <div id="bandDetails" style="display: none;">
              <p id="location">{{ $user->location }}</p>
              <p id="instrument">{{ $user->instrument }}</p>
              <p id="level">{{ $user->level }}</p>
              <p id="genre">{{ $user->genre }}</p>
              <p id="about">{{ $user->about }}</p>
            </div>
          </div>
        </div>

        @endforeach
    </div>
    @endforeach
</div>


<script src="/js/index.js"></script>


<script>
$('.zoom-btn').click(function(){
  var image = $(this).closest('.thumbnail').find('img').attr('src'); 
  var title = $(this).closest('.overlay').find('h2').text();
  var details = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis amet eum quod labore deserunt, adipisci.';
  
  var fullView = '<div class="media-view"><div class="media-thump"><img src="'+ image +'"/></div><div class="media-info"> <h2>'+ title +'</h2> <p>'+ details +'</p></div> <span class="close">&times</span></div>';
  

  
   $('.thumbnail').removeClass('open');
  
  if($(this).closest('.media-row').next('.media-view').length != 0) { 
      $('.media-thump img').attr('src' , image);
      $('.media-info h2').text(title);
  }
  else if (! $(this).closest('.thumbnail').hasClass('open')) { 
     $('.media-view').remove();
      $(this).closest('.media-row').after(fullView);
      $('.media-view').slideDown();
      $(this).closest('.thumbnail').addClass('open');
  }
  
});

$(".media").on("click", ".close", function() {
  $(this).closest('.media-view').slideUp();
  $('.thumbnail').removeClass('open');
  
  setTimeout(function(){
    $('.media-view').remove()
  }, 2000);
});
</script>
@stop