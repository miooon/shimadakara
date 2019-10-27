// script js


// ローディング処理
// Pace.on('done', function(){
$(function(){

	var now = new Date().getTime();
	var open = new Date(2019,10,1).getTime();
	var days = Math.ceil((open-now)/ ( 1000 * 60 * 60 * 24 ));

	if(days < 0){
		days = 0;
	}

	$('#days').text(days);

	// $('#wrapper').fadeIn(1000);

	$.sublime_slideshow({
		src:[
			{url:"img/01.jpg"},
			{url:"img/02.jpg"},
			{url:"img/03.jpg"},
			{url:"img/04.jpg"},
			{url:"img/05.jpg"}

		],
		smpSrc:[
			{url:"img/01.jpg"},
			{url:"img/02.jpg"},
			{url:"img/03.jpg"},
			{url:"img/04.jpg"},
			{url:"img/05.jpg"}
		],
		rotating:false,
		scaling:false,
		overlay:false
	});
});