//
// util.js
//
// rollover - simple rollover image
// scroll - smooth scroll
// fade - chage opacity
//

(function($){
	$(function() {
		$.util.rollover();
		$.util.scroll();
		$.util.fade();
		$.util.nav();
		$.util.menu();
	});

	$.util = {
		menu:function(){
			var $triger = $('#menu');

			$triger.click(function(){
				$triger.toggleClass('open');
				$('header.fixed nav').fadeToggle();
				return false;
			});

			$('header.fixed nav ul li a').click(function(){
				var w = $(window).width();
				console.log('hg');
				if(w < 768){
					$triger.removeClass('open');
					$('header.fixed nav').fadeOut();
				}
			});
		},
		nav:function(){
			$(window).on('scroll',function(){
				var st = $(this).scrollTop();
				if(st < $(this).innerHeight()){
					$('header.fixed').removeClass('open');
				}else{
					$('header.fixed').addClass('open');
				}
			}).scroll();
		},
		rollover: function(options){
			var opt = $.extend({
				hoverSelector: 'hover',
				postfix: 'hover'
			}, options);

			$('[data-role="' + opt.hoverSelector + '"]').each(function(){
				this.originalSrc = $(this).attr('src');
				if(this.originalSrc){
					this.rolloverSrc = this.originalSrc.replace(new RegExp('(' + opt.postfix + ')?(\.gif|\.jpg|\.png)$'), opt.postfix + "$2" );
					this.rolloverImg = new Image;
					this.rolloverImg.src = this.rolloverSrc;
				}
			});

			$('[data-role="' + opt.hoverSelector + '"]').hover(function(){
				$(this).attr('src',this.rolloverSrc);
			},function(){
				$(this).attr('src',this.originalSrc);
			});
		},

		scroll:function(options){
			var opt = $.extend({
				pageTop: 'pageTop',
				anchorLink: 'anchor'
			}, options);

			var target = (!window.chrome && 'WebkitAppearance' in document.documentElement.style) ? 'body' : 'html';
			if(navigator.userAgent.indexOf("Edge") >= 1){
				target = 'body';
			}



			$('[data-role="' + opt.anchorLink + '"]').click(function(){
					var off = $('header.fixed').innerHeight() + 20;
					// console.log(off);
					var aim = Math.floor($($(this).attr('href')).offset().top);
					var contentheight = ($.support.boxModel) ? $('body').height() : document.body.scrollHeight ;
					aim = (aim >(contentheight - $(window).height())) ? contentheight - $(window).height() + 1 : aim - off;
					$(target).animate({scrollTop:aim}, { duration: 500, easing:'easeOutExpo' });
					return false;
			});

			$('[data-role="' + opt.pageTop + '"]').click(function(){
					$(target).animate({scrollTop:0}, { duration: 500, easing:'easeOutExpo' });
					return false;
			});
		},

		fade: function(options){
			var opt = $.extend({
				elm: 'fade'
			}, options);

			$('[data-role="' + opt.elm + '"]').hover(function(){
				$(this).fadeTo(100, 0.7);
			},
			function(){
				$(this).fadeTo(100, 1.0);
			});
		}
	};
})(jQuery);

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 */

jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});