//GENERALES
var ww = 0;
var wh = 0;
var screenMode = '';

function setScreen()
{
	ww = $(window).width();
	wh = $(window).height();
	
	var screenModeTmp = '';
	
	if(ww>wh)
	{
		screenModeTmp = 'landscape';
	}
	else
	{
		screenModeTmp = 'portrait';
	}
	
	//*
	$('.section').css('min-height', wh-70+'px');
	
	//home
	$('.section.home .slide').css('height', wh-70+'px');
	
	//testimonios
	if(ww>wh)
	{
		$('.section.testimonios').css('min-height', wh*.8-70+'px');
		$('.content .section.testimonios .slide_c').css('height', $('.section.testimonios').height()+'px');
		
		var testimonioMT = ($('.section.testimonios').height()-$('.content .section.testimonios .slide_c .slide').height())/2;
		$('.content .section.testimonios .slide_c .slide').css('margin-top', testimonioMT+'px');
	}
	else
	{
		$('.section.testimonios').css('min-height', wh-70+'px');
		$('.content .section.testimonios .slide_c').css('height', $('.section.testimonios').height()+'px');
		
		var testimonioMT = ($('.section.testimonios').height()-$('.content .section.testimonios .slide_c .slide').height())/2;
		$('.content .section.testimonios .slide_c .slide').css('margin-top', testimonioMT+'px');
	}
	
	
	//blog
	$('.content .section.blog .slide_c').css('height', wh-194+'px');
	$('.content .section.blog .slide_c .slides').css('height', wh-194+'px');
	$('.content .section.blog .slide_c .slides .slide').css('height', wh-194+'px');
	$('.content .section.blog .slide_c .slides .slide .over').css('height', wh-194+'px');
	$('.content .section.blog .slide_c .slides .slide .over .background').css('height', wh-194+'px');
	
	var aaa = ($('.content .section.blog .slide_c').height()-$('.content .section.blog .slide_c .slide .over h3').height())/2-50;
	$('.content .section.blog .slide_c .slide .over h3').css('margin-top', aaa+'px');
	
	//clientes
	var clientesMT = (wh-$('.content .section.clientes .logos').height())/2;
	$('.content .section.clientes .logos').css('margin-top', clientesMT+'px');
	
	if(screenModeTmp != screenMode)
	{
		screenMode = screenModeTmp;
		
		//top
		if(screenMode == 'landscape')
		{
			$('.top .menu').fadeIn(400);
		}
		else
		{
			$('.top .menu').hide();
			menuOpen = false;
			$('.top .hamburger').css('background-position', 'top');
		}
		
		//home
		slideHomePrint();
	}
	
	if(screenMode == 'landscape')
	{
		//casos
		var casosDif = wh-70 - $('.content .section.casos .casos').height();
		$('.content .section.casos .txt').css('height', casosDif+'px');
		
		//trabajos
		var trabajosDif = wh-130 - $('.content .section.trabajos .trabajos').height();
		$('.content .section.trabajos .txt').css('min-height', trabajosDif+'px');
	}
	else
	{
		//casos
		$('.content .section.casos .txt').css('height', 'auto');
		
		//trabajos
		$('.content .section.trabajos .txt').css('height', 'auto');
	}
}

function nav(section)
{
	$('html, body').animate({
        scrollTop: $('.section.'+section).offset().top-70
    }, 1200);
	
	if(wh>ww)
	{
		menuToggle();
	}
}

//TOP
var menuOpen = false;

function menuToggle()
{
	if(menuOpen)
	{
		$('.top .menu').fadeOut(250);
		$('.top .hamburger').css('background-position', 'top');
	}
	else
	{
		$('.top .menu').fadeIn(400);
		$('.top .hamburger').css('background-position', 'bottom');
	}
	
	menuOpen = !menuOpen;
}

//HOME
var slideHomeCount = 1;
var slideHomeTotal = 4;

function slideHomePrint()
{
	var homeSlideHtml = '';
	
	if(screenMode == 'landscape')
	{
		homeSlideHtml = 'uploads/'+slideHomeCount+'.gif';
	}
	else
	{
		homeSlideHtml = 'uploads/'+slideHomeCount+'m.gif';
	}
	
	$('.section.home .slide').css('background-image', 'url('+homeSlideHtml+')');	
}

function onSlideHome(orientation)
{
	if(orientation == 'left')
	{
		if(slideHomeCount>1)
		{
			slideHomeCount--;
		}
		else
		{
			slideHomeCount = 4;
		}
	}
	else
	{
		if(slideHomeCount<slideHomeTotal)
		{
			slideHomeCount++;
		}
		else
		{
			slideHomeCount = 1;
		}
	}
	
	slideHomePrint();
}

//TESTIMONIOS
var slideTestimoniosCount = 1;
var slideTestimoniosTotal = 3;

function onSlideTestimonios(orientation)
{
	if(orientation == 'left')
	{
		if(slideTestimoniosCount>1)
		{
			slideTestimoniosCount--;
		}
		else
		{
			slideTestimoniosCount = 3;
		}
	}
	else
	{
		if(slideTestimoniosCount<slideTestimoniosTotal)
		{
			slideTestimoniosCount++;
		}
		else
		{
			slideTestimoniosCount = 1;
		}
	}

	$('.content .section.testimonios .slide_c .slide').hide();
	$('.content .section.testimonios .slide_c .slide.n'+slideTestimoniosCount).fadeIn(400);
}

/*blog*/
function onBlogOver(id)
{
	//if(ww>wh)
	//{
		$('.content .section.blog .slide_c .slides .slide.n'+id+' .over').show();
	//}
}

function onBlogOut(id)
{
	//if(ww>wh)
	//{
		$('.content .section.blog .slide_c .slides .slide.n'+id+' .over').hide();
	//}
}

/*------------------------------------------------------------------------*/

$(document).on('click', '.home-a.banner',function() {
   $('.overlay').addClass('active');
});

$(document).on('click', '#app > div.overlay > div > div',function() {
   $('.overlay').removeClass('active');
});

$(document).on('click', 'div.top .logo', function () {
	window.location.href = "http://tmlaravel.tmgroupweb.com/newhome";
});






















