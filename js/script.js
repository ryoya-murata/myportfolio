//==================
// top
//==================

var tl = new TimelineMax();

tl.fromTo('.top__img-wrap',1,{
    height:'0%'
},{
    height:'100%',ease:"power2.easeInOut"
}).staggerFromTo('.top__letter',1,{
    x:'1em',y:'1.2em',rotateZ:180
},{
    x:0,y:0,rotateZ:0,ease:"power2.easeInOut"
},0.05);

//==================
// works
//==================

var mySwiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 2,
    spaceBetween: 30,
    initialSlide: 0,
    centeredSlides : true,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
    }
});
