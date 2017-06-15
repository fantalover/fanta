$(document).ready(function() {
    console.log( "JQuery correct gelinkt" );
});

console.log($('body'));
console.log($('p'));
console.log($('section p'));
console.log($('#mainNav li'));
console.log($('p.contentTxt strong'));
console.log($('h1').text());
console.log($('p.contentTxt:odd').text());
console.log($('li#active a').attr('href'));
console.log($('p:first.contentTxt'));

//oef 3

$('p:odd').css('background-color', 'yellow');
$('li#active a').css({
					'background-color': 'yellow',
					'color': 'yellow'
				});

$('li#active a').attr('href','#');

$('section p').last().html('<strong>Lorem</strong>');

//oef 4


$('li#active a').click(function(){
	console.log('zever');
})

//oef 5

