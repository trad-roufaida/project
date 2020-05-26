$(document).ready(function() {
$('.header_navbar_toggle').click(function(e) {
	e.preventDefault();
	$('.header_navbar').toggleClass('is_open');

}); });
/*
var bt = document.querySelector('.header_navbar_toggle');
var nav = document.querySelector('.container');

bt.onClick =function(){
	container.toggleClass('is_open');
}*/
