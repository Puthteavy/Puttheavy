$(document).ready(function(){

  $(window).scroll( function() {
    if( $(this).scrollTop() > 500 ) {
      $('#gotoTop').fadeIn("slow"); 
    } else {
      $('#gotoTop').fadeOut("slow"); 
    }
  });
	$('#gotoTop').click(function(){
		$('body,html').animate({scrollTop:0}, 1000);
		return false;
	});


	//Initialize Swiper 
  var swiperTopPage = new Swiper('.swiperTopPage', {
    spaceBetween: true,
    slidesPerView: 2,
    centeredSlides: true,
    loop: true,
    speed: 2500,
    autoplayDisableOnInteraction: false,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiperTopPage .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiperTopPage .swiper-button-next',
      prevEl: '.swiperTopPage .swiper-button-prev',
    },
  }); 


  //Initialize Swiper 01
  var swiperTopPage = new Swiper('.swiperTopPage01', {
    // spaceBetween: -124,
    slidesPerView: 1,
    centeredSlides: true,
    loop: true,
    speed: 2000,
    autoplayDisableOnInteraction: false,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiperTopPage01 .swiper-pagination',
      clickable: true,
    },
    
  }); 

  var swiperImages = new Swiper('.swiperImages', {
    slidesPerView: 3,
    spaceBetween: 3,
    // slidesPerGroup: 3,
    speed: 1000,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplayDisableOnInteraction: false,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiperImages .swiper-button-next',
      prevEl: '.swiperImages .swiper-button-prev',
    },
  });

  var swiperYoutube = new Swiper('.swiperYoutube', {
    centeredSlides: true,
    slidesPerColumn: 3, 
    spaceBetween: 10,
    // loop: true,
    speed: 1000,
    autoplayDisableOnInteraction: false,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiperYoutube .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiperYoutube .swiper-button-next',
      prevEl: '.swiperYoutube .swiper-button-prev',
    },
  });

  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the button that opens the modal
  var btn = document.getElementById("btnLogin");
  var spBtn = document.getElementById("spBtnLogin");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
      modal.style.display = "block";
  }
  spBtn.onclick = function() {
      modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }


  $('a[href^="#link"]').on('click',function (e) {
      e.preventDefault();

      var target = this.hash;
      var $target = $(target);

      $('html, body').stop().animate({
          'scrollTop': $target.offset().top - 50
      } ); 
  });

  // set the heighest value to each element
  var heighest = -1;
  $('.spSwiper > article').each(function() {
    heighest = heighest > $('.spSwiper > article').height() ? heighest : $('.spSwiper > article').height();
  });

  $('.spSwiper > article').each(function() {
    $('.spSwiper > article').height(heighest + 66);
  });
    
    
  $('.tabs .tabLinks a').on('click', function(e)  {
    var currentAttrValue = $(this).attr('href');

    // Show/Hide Tabs
    jQuery('.tabs ' + currentAttrValue).fadeIn(500).siblings().hide();

    // Change/remove current tab to active
    $(this).parent('li').addClass('active').siblings().removeClass('active');
    $(this).parent('li').parent('.tabLinks').siblings().children('li').removeClass('active');

    e.preventDefault();
  });

  $('.faqList li').on('click', function() { 
    if($(this).children('.faqAnswer').is(':visible')) {
      $(this).children('.faqAnswer').slideUp();
      $(this).children('i').addClass('fa-plus-square').removeClass('fa-minus-square');
    } else {
      $(this).children('.faqAnswer').slideDown();
      $(this).children('i').addClass('fa-minus-square').removeClass('fa-plus-square');
    } 
  });
// image change on footer
     $('a#fb_link img').mouseover(function(){
         $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/fb_icon.png');
      }).mouseout(function (){
        $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/facebook.png');
         
      });
      $('a#twit_link img').mouseover(function(){
         $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/twit_icon.png');
      }).mouseout(function (){
        $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/twitter.png');
         
      });
      $('a#tube_link img').mouseover(function(){
         $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/tube_ico.png');
      }).mouseout(function (){
        $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/youtube.png');
         
      });
      $('a#blog_link img').mouseover(function(){
         $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/blog_ico.png');
      }).mouseout(function (){
        $(this).attr('src','http://padelasia.sakura.ne.jp/padelnf/wp-content/themes/padel/img/blog.png');
         
      });
      // sp change image footer icon

     


  

});
