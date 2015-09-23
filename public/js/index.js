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