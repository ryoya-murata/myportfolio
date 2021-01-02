//==================
// header
//==================

$(function(){
    // windowsがスクロールされたときに以下の内容を実行
    $(window).scroll(function(){    
        // windowの現在のスクロール位置を取得
        var scrollTop = $(window).scrollTop();
        // 対象エリアの高さを取得
        var areaHeight = $('.top').innerHeight();
        
        // 現在のスクロール位置が対象エリアの半分より大きければ以下の内容を実行
        if(scrollTop > areaHeight/2){
            $('.header').addClass('header--bg_brown');
        } else {
            $('.header').removeClass('header--bg_brown');
        }
    })
})

$(function(){
    $('a[href^="#"]').click(function(){　　  
        var speed = 500;　　　　                                                      
        var adjust = $('.header').innerHeight();                                       
        var href= $(this).attr("href");　　　                                        
        var target = $(href == "#" ? 'html' : href);                                 
        var position = target.offset().top;　                                       
        $("html, body").animate({scrollTop:position - adjust}, speed, "swing");    　
        return false;
      });

})

$(function(){
    $(window).scroll(function(){
        var adjust = $(".header").innerHeight();
        var scrollTop = $(window).scrollTop() + adjust + 1  ;
        var aboutTop = $(".about").offset().top;
        var aboutBottom = aboutTop + $(".about").innerHeight();
        var skillTop = $(".skill").offset().top;
        var skillBottom = skillTop + $(".skill").innerHeight();
        var flowTop = $(".flow").offset().top;
        var flowBottom = flowTop + $(".flow").innerHeight();
        var worksTop = $("#works").offset().top;
        var worksBottom = worksTop + $("#works").innerHeight();
        var contactTop = $(".contact").offset().top;
        var contactBottom = contactTop + $(".contact").innerHeight();

        if(scrollTop >= aboutTop && scrollTop <= aboutBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#about"]').addClass("header__link--active");
        } else if (scrollTop >= skillTop && scrollTop <= skillBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#skill"]').addClass("header__link--active");
        } else if (scrollTop >= flowTop && scrollTop <= flowBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#flow"]').addClass("header__link--active");
        } else if (scrollTop >= worksTop && scrollTop <= worksBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#works"]').addClass("header__link--active");
        } else if (scrollTop >= contactTop && scrollTop <= contactBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#contact"]').addClass("header__link--active");
        } else{
            $(".header__link").removeClass("header__link--active");
        }
    })
})

$(function () {
    // クリック時の動作
    $('.hamberger__line-wrap').on('click', function() {
        var scrollpos;

        // メニューを閉じる
        if($(this).hasClass('open')) {
            $(this).removeClass('open');
            $('.hamberger-menu').removeClass('open');
            $('.overlay').removeClass('open');
            $('body').removeClass('fixed');


        // メニューを開く
        } else {
            $(this).addClass('open');
            $('.hamberger-menu').addClass('open');
            $('.overlay').addClass('open');
            $('body').addClass('fixed');
        }
    });
});



//==================
// top
//==================

TweenMax.fromTo('.top__img-wrap',1.5,{
    opacity:0
},{
    opacity:1,ease:"power2.easeInOut",delay:.2
});
TweenMax.fromTo('.top__button-wrap',1.5,{
    opacity:0
},{
    opacity:1
});
TweenMax.staggerFromTo('.top__letter',1,{
    x:'1em',y:'1.2em',rotateZ:180
},{
    x:0,y:0,rotateZ:0,ease:"power2.easeInOut",delay:.5
},0.05);



//==================
// works
//==================

var mySwiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 30,
    initialSlide: 0,
    centeredSlides : true,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
    },
    breakpoints:{
        767:{
            slidesPerView: 2,
        }
    }
});

//==================
// contact
//==================

$(document).ready(function () {

    $('#form').submit(function (event) {
      var formData = $('#form').serialize();
      $.ajax({
        url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSc2_Uup7nXL74oImaGDhvusVMTMXrt12H-p7hRvkL9GPj8wzg/formResponse",
        data: formData,
        type: "POST",
        dataType: "xml",
        statusCode: {
          0: function () {
            $(".form__end-message").fadeIn();
            $(".form,.section__desc--contact").fadeOut();
            //window.location.href = "thanks.html";
          },
          200: function () {
            $(".form__false-message").fadeIn();
          }
        }
      });
      event.preventDefault();
    });

  });