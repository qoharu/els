  function get(name){
   if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
  }
$(document).ready(function(){
    // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  // Add smooth scrolling to all links in navbar + footer link
  $("footer a[href='#myPage']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });

  if (get('modal')==1){
    switch(get('type')){
      case '0' :
        var color = "bg-green-active";
        var title = "Success";
        break;
      case '1' :
        var color = "bg-red";
        var title = "Error";
        break;
    }

    $('#modal-content').html(get('message'));
    $('#modal-title').html(title);
    $('.modal-header').addClass(color);
    $('.modal-close').addClass(color);
    $('.example-modal').fadeIn('slow');
    $('.modal-close').click(function(){
      $('.example-modal').fadeOut('fast');
    })
  }
});
