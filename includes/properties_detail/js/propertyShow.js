/*lightbox*/ 
 $(document).ready(function(){
    $('#lightgallery').lightGallery();
});
 $(document).ready(function(){
    $('#nearby').lightGallery();
});

/*inquiry form fixed*/
$(document).ready(function() {
	var sidebar = $('.sidebar');
	var top = sidebar.offset().top - parseFloat(sidebar.css('margin-top'));

	$(window).scroll(function (event) {
	  var y = $(this).scrollTop();
	  if (y >= top) {
	    sidebar.addClass('fixed');
	  } else {
	    sidebar.removeClass('fixed');
	  }
	});
}); 

/*view more content link*/
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 330;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Read more >";
    var lesstext = "Read less";
    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});


/*bank logo*/
(function(){
$('#itemslider').carousel({ interval: 3000 });
}());

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();


      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }


      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());

/*scroll*/
 $(document).ready(function() {

  	$(function() {

      	$(document).on('scroll', function() {

          if ($(window).scrollTop() > 100) {
              $('.scroll-top-wrapper').addClass('show');
          } else {
              $('.scroll-top-wrapper').removeClass('show');
          }
      });

      $('.scroll-top-wrapper').on('click', scrollToTop);
  });

  function scrollToTop() {
      verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
      element = $('body');
      offset = element.offset();
      offsetTop = offset.top;
      $('html, body').animate({
          scrollTop: offsetTop
      }, 500, 'linear');
  }

 });