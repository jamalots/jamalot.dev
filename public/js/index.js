$('.zoom-btn').click(function(){
  var image = $(this).closest('.thumbnail').find('img').attr('src'); 
  var title = $(this).closest('.overlay').find('h2').text();
  var location = $(this).closest('.overlay').find('#location').text();
  var instrument = $(this).closest('.overlay').find('#instrument').text();
  var level = $(this).closest('.overlay').find('#level').text();
  var genre = $(this).closest('.overlay').find('#genre').text();
  var about = $(this).closest('.overlay').find('#about').text();
  var userid = $(this).closest('.overlay').find('#userid').text();
  
  
  var fullView = '<div class="media-view"> <div class="media-thump"><img src="'+ image +'"/></div> <div class="media-info"><h2>'+ title +'</h2><table class="table"><tr><td>Location:</td><td>' + location + '</td></tr><tr><td>Instrument:</td><td>' + instrument + '</td></tr><tr><td>Playing Level:</td><td>' + level + '</td></tr><tr><td>Genre:</td><td>' + genre + '</td></tr><tr><td>About:</td><td>' + about + '</td></tr><tr><td><a class="btn btn-primary" href="http://jamalot.dev/users/' + userid + '" role="button">Visit Profile</a></td><td></td></tr></table></div><span class="close">&times</span></div>';
  

  
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