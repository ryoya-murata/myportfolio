TweenMax.fromTo('.top__img-wrap',1,{height:'0%'},{height:'80%',ease:"power2.easeInOut"});
TweenMax.fromTo('.top__img-wrap',1,{width:'100%'},{width:'70%',ease:"power2.easeInOut",delay:1.2});
TweenMax.fromTo('.overlay',1,{x:'-100%'},{x:'0%',ease:"power2.easeInOut",delay:1.2});
TweenMax.fromTo('.header__logo-wrap',1,{opacity:0,y:-10},{opacity:1,y:0,ease:"power2.easeInOut"});
TweenMax.staggerFromTo('.top__letter',1,{x:'1em',y:'1.2em',rotateZ:180},{x:0,y:0,rotateZ:0,ease:"power2.easeInOut",delay:1.2},0.05);
