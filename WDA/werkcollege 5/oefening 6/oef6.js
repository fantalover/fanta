/*
$color = $(document.activeElement).attr('id');

$(document).ready(function () {
        $('button').click(function () {
          
          $('div').css({
					'background-color': 
					
				});
        })
    })

*/


$("button").click(function(){
    if ($(this).val() == "red") {
	$("div").css("background-color" , "Red");
}else if ($(this).val() == "green") {
	$("div").css("background-color" , "Green");
} else {
	$("div").css("background-color" , "blue");
}
});


